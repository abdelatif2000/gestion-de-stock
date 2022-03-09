<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Traits\HelperTraits;
use Illuminate\Validation\Rule; 

class ProviderController extends Controller
{
    use HelperTraits;
    public function index()
    {
        $this->authorize('isAble','ProviderController@index');
        $results = Provider::where("isDeleted",0)->get();
        return view('provider.index', compact('results'));
    }
    public function create()
    {
       $this->authorize('isAble','ProviderController@create');
        return view('provider.add');
    }
    public function store(Request $request)
    {
       $this->authorize('isAble','ProviderController@create');
       if(!$this->checkIsDelete(Provider::class,$request)){
        $rules= [
            "fullName"=>["required","unique:providers"],
            "email"=>["email","unique:providers" ],
            "ICE"=>["required",'unique:providers'],
        ];
        $messages =[];
        $attributes=[
            'fullName' =>__('public.fullName'),
            'address' =>__('public.address'),
            "ICE"=>__('provider.ICE'),
        ];
        $request->validate($rules,$messages,$attributes);
        Provider::create($request->all());
     }
        return redirect()->route('provider.index')->with('success',__('provider.success_add'));
    }
    public function edit($id)
    {
        $this->authorize('isAble','ProviderController@update');
        $result = Provider::find($id);
        return view('provider.edit', compact('result'));
    }
    public function update(Request $request, $id)
    {
        
        $this->authorize('isAble','ProviderController@update');
        $rules= [
            "fullName"=>["required",Rule::unique("providers")->ignore($id)],
            "email"=>["email", Rule::unique("providers")->ignore($id)],
            "ICE"=>["required",Rule::unique("providers")->ignore($id)],
        ];
        $messages =[];
        $attributes=[
            'fullName' =>__('public.fullName'),
            'address' =>__('public.address'),
            "ICE"=>__('provider.ICE'),
        ];
        $request->validate($rules,$messages,$attributes);
        Provider::find($id)->update($request->all());
        return redirect()->route('provider.index')->with('success', __('provider.success_update'));
    }
    public function destroy($id)
    {
        $this->authorize('isAble','ProviderController@delete');
        $provider=Provider::find($id);
        $this->authorize('delete',$provider);
        $provider->update(['isDeleted'=>1]);
        return redirect()->back()->with('success', __('provider.success_delete'));
    }
}
