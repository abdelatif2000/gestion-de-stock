<?php
namespace App\Http\Controllers;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\HelperTraits;

class ClientController extends Controller
{
    use HelperTraits;
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
    public function store(Request $request)
    {
        $this->authorize('isAble','ClientController@create');
        if(!$this->checkIsDelete(Client::class,$request)){
            $rules= [
                "fullName"=>['required',"unique:clients"],
                "email"=>["email","required","unique:email"],
            ];
            $messages =[];
            $attributes=[
                'fullName' =>__('public.fullName'),
                'address' =>__('product.address'),
            ];
            $request->validate($rules,$messages,$attributes);
            Client::create($request->all());
         }
        return redirect()->route("Client.index")->with('success',__('client.success_add'));
    }
    public function edit($id)
    {
        $this->authorize('isAble','ClientController@update');
        $result = Client::find($id);
        return view('Client.edit', compact('result'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('isAble','ClientController@update');
        $rules= [
            "fullName"=>['required',Rule::unique("clients")->ignore($id)],
            "email"=>["email","required",Rule::unique("clients")->ignore($id)],
        ];
        $messages =[];
        $attributes=[
            'fullName' =>__('public.fullName'),
            'address' =>__('product.address'),
        ];
        $request->validate($rules,$messages,$attributes);
        Client::find($id)->update($request->all());
        return redirect()->route("Client.index")->with('success',__('client.success_update'));
    }
    public function destroy(Request $request, $id)
    {
        $this->authorize('isAble','ClientController@update');
        $client=Client::find($id);
        $client->update(['isDeleted'=>1]);
        return redirect()->route("Client.index")->with('success',__('client.success_delete'));
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
