<?php
namespace App\Http\Controllers;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $this->authorize('isAble','ClientController@index');
        $results = Client::where("isDeleted",0)->get();
        return view('Client.index', compact('results'));
    }
    public function create()
    {
        $this->authorize('isAble','ClientController@index');
        return view('Client.add');
    }
    public function store(ClientRequest $request)
    {
        $this->authorize('isAble','ClientController@create');
        Client::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'tel' => $request->tel,
            'fix' => $request->fix
        ]);
        return back()->with('success', 'The Client Added Successfully');
    }
    public function edit($id)
    {
        $this->authorize('isAble','ClientController@update');
        $result = Client::find($id);
        return view('Client.edit', compact('result'));
    }
    public function update(ClientRequest $request, $id)
    {
        $this->authorize('isAble','ClientController@update');
        $client=Client::find($id);
        Client::find($id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'tel' => $request->tel,
            'fix' => $request->fix
        ]);
        return redirect('/Client')->with('success', 'The Client  Updated Successfully');
    }
    public function destroy(Request $request, $id)
    {
        $this->authorize('isAble','ClientController@update');
        $client=Client::find($id);
        $client->update(['isDeleted'=>1]);
        return redirect()->back()->with('success', 'The Client Deleted Successfully');
    }
    public function show($id)
    {
        $this->authorize('isAble','ClientController@show');
        $client = Client::find($id);
         $result=Client::where("id",$id)
         ->withCount('commands')
         ->with(['commands'=>function($query){
            $query->withSum("rules","total_payment")
            ->withSum("products as price_total",DB::raw('product_command.price *product_command.quantity'))
            ->with(["products"=> function($query){
                    $query->with("product")->get();
            }] )->where('isDeleted',0)->get();
         }])->get();
       $total_rest=0;
       $total_cost=0;
       foreach($result[0]->commands as $item){
          $rest_order=$item->price_total - $item->rules_sum_total_payment;
          $item->rest=$rest_order;
           $total_rest+=$rest_order;
          $total_cost+=$item->rules_sum_total_payment;
       }
       $result[0]->total_rest=$total_rest;
       $result[0]->total_cost=$total_cost;
         return view('Client.show',compact("result"));
    }
}
