<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Store;


class StoreController extends Controller
{
    public function index()
    {
      
        $this->authorize('isAble','StoreController@index');
        $results = Store::where("isReturned", 0)
        ->selectRaw("id,product_id, SUM(quantity) as total_product")
        ->groupBy("product_id")->with("product")->get();
        return view('store.index', compact('results'));
    }
    public function create()
    {
        $this->authorize('isAble','StoreController@create');
        $products = Product::where("isDeleted", 0)->select(['name', 'id'])->get();
        $providers = Provider::select(['firstName', 'lastName', 'id'])->get();
        return view('store.add', compact('products', 'providers'));
    }
    public function store(StoreRequest $request)
    {
        $this->authorize('isAble','StoreController@create');
        Store::create([
            'product_id' => $request->product,
            'provider_id' => $request->provider,
            'quantity' => $request->quantity,
        ]);
        return back()->with('success', 'The Product Added Successfully To Store');
    }
    public function edit($id)
    {
        $this->authorize('isAble','StoreController@edit');
        $products = Product::select(['name', 'id'])->get();
        $providers = Provider::select(['firstName', 'lastName', 'id'])->get();
        $result = Store::with('provider', 'product')->find($id);
        return view('Store.edit', compact('result', 'products', 'providers'));
    }
    public function update(StoreRequest $request, $id)
    {
        $this->authorize('isAble','StoreController@edit');
        Store::find($id)->update([
            'product_id' => $request->product,
            'provider-id' => $request->provider,
            'quantity' => $request->quantity,
        ]);
        return redirect('/Store')->with('success', 'The Product  Updated Successfully');
    }
    public function destroy($id)
    {

        $this->authorize('isAble','StoreController@delete');
        $Store = Store::with('photos')->find($id);
        if ($Store) {
            foreach ($Store->photos as $photo) {
                unlink($photo->path);
            }
        }
        Store::find($id)->delete();
        return redirect()->back()->with('success', 'The Store Deleted Successfully');
    }
    public function show($id)
    {
        $this->authorize('isAble','StoreController@show');
      $result =Store::where([
        ["product_id",'=',$id],
        ["isReturned",'=',0]
      ]
       )->with('provider','product')->get();
       return view('Store.show',compact('result'));
    }
    public function return($id)
    {
        $this->authorize('isAble','StoreController@return');
        Store::where('id', $id)
        ->update(['isReturned'=>1]);
        return back()->with("success","The Quantity Removed From Stock");
    }
}
