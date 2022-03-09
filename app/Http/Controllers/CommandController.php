<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandRequest;
use App\Models\Client;
use App\Models\Command;
use App\Models\InfoCompany;
use App\Models\Product;
use App\Models\product_command;
use App\Models\Rule;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CommandController extends Controller
{
    public function index(Request $request)
    {
        $results = Command::withCount('products')
            ->withSum('products', DB::raw('product_command.price *product_command.quantity'))
            ->with(["products" => function ($query) {
                $query->with("product")->get();
            }, "client"])->whereHas("products")->where("isDeleted", 0)
            ->orderBy("created_at", "desc")->get();
        return view('Command.index', compact('results'));
    }
    public function create(Request $request)
    {
        $products = Store::where("isReturned", 0)
            ->selectRaw("id,product_id, SUM(quantity)-SUM(sold) as total_product")
            ->groupBy("product_id")
            ->with("product")->get();
        $products = $products->filter(function ($product) {
            return $product->total_product > 0;
        });
        if ($request->id) {
            $client_id = $request->id;
            return view('Command.add', compact('client_id', 'products'));
        } else {
            $clients = Client::where("isDeleted", 0)->get();
            return view('Command.add', compact('clients', 'products'));
        }
    }
    public function store(CommandRequest $request)
    {
        // remove  the quantity from the store :
        foreach ($request->products as $productSold) {
            $products = Store::where([
                ["isReturned", 0],
                ["quantity", ">", DB::raw("sold")],
                [
                    'product_id', '=', $productSold['product_id']
                ]
            ])
                ->get();
            foreach ($products as  $product) {
                $available =  $product->quantity - $product->sold;
                if ($available > $productSold['quantity']) {
                    Store::find($product->id)
                        ->update(["sold" => $product->sold + $productSold['quantity']]);
                    break;
                } else {
                    Store::find($product->id)
                        ->update(["sold" => $product->quantity]);
                    $productSold['quantity'] -= $available;
                }
            }
        }
        //insert  the command 
        Command::create([
            'client_id' => $request->client,
            "ref" => $request->ref
        ]);
        //insert  the  products commanded 
        foreach ($request->products as $product) {
            product_command::create([
                "product_id" => $product['product_id'],
                "command_id" => Command::select('id')->latest()->first()->id,
                "quantity" => $product['quantity'],
                "price" => Product::find($product['product_id'])->price
            ]);
        }

        return response()->json(['success' => 'Command Added Successfully']);
    }
    public function edit($id)
    {
        $products_list = Product::all();
        $clients = Client::all();
        $products_commanded = product_command::where("command_id", $id)->with("product")->get();
        $result = Command::with("products", "client")->find($id);
        return view('Command.edit', compact('result', 'clients', 'products_list', 'products_commanded'));
    }
    public function update(CommandRequest $request, $id)
    {
        $products_commanded = product_command::where("command_id", $id)->with("product")->get();
        Command::find($id)->update([
            'client_id' => $request->client,
            "ref" => $request->ref
        ]);
        foreach ($products_commanded as $product) {
            product_command::find($product->id)->delete();
        }
        foreach ($request->products as $product) {
            product_command::create([
                "product_id" => $product['product_id'],
                "command_id" => $id,
                "quantity" => $product['quantity'],
                "price" => Product::find($product['product_id'])->price
            ]);
        }
        return response()->json(['success' => 'Command Updated Successfully']);
    }
    public function destroy($id)
    {
        Command::find($id)->update(['isDeleted' => 1]);
        return redirect()->back()->with('success', 'The Command Deleted Successfully');
    }
    public function show($id)
    {
        $result = Command::withSum('products', DB::raw('product_command.price *product_command.quantity'))
            ->with(["products" => function ($query) {
                $query->with("product")->get();
            }, "client"])->where("id", $id)->orderBy("created_at", "desc")->get();
        return view('Command.show', compact('result'));
    }
    public function destroyProduct($id)
    {
        if ($id) {
            product_command::findOrfail($id)->delete();
        }
        return      redirect()->back()->with('success', 'The Product Deleted Successfully');
    }
    public function generateInvoice($id)
    {
        if ($id) {
            $infoCompany = InfoCompany::first()->get();
            $result = Command::with([
                "products" => function ($query) {
                    $query->with(["product"])->get();
                }, "client"
            ])->findOrfail($id);
            $pdf = PDF::loadView('Command.generateInvoice', compact("result", "infoCompany"));
            return $pdf->download("test.pdf");
        }
        return back();
    }
    public function payment(Request $request, $id)
    {
        Rule::create([
            "command_id" => $request->id,
            "total_payment" => $request->total_payment
        ]);
        return  response()->json(["success" => "The payment was successfully"]);
    }
    public function orderInfo(Request $request)
    {
        $result = Command::withSum('products as totalOrder', DB::raw('product_command.price *product_command.quantity'))->find($request->id);
        return response()->json($result);
    }
}
