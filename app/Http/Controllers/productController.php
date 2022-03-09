<?php
namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Traits\HelperTraits;

class productController extends Controller
{
    use HelperTraits;
    public function index()
    {
        $this->authorize('isAble',"ProductController@index");
        $results = Product::where("isDeleted",0)->with('category')
        ->orderBy('created_at','ASC')->get();
        return view('product.index',compact('results'));
    }
    public function create()
    {
        $this->authorize('isAble',"ProductController@create");
        $categories = Category::select(['name', 'id'])->get();
        return view('product.add', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->authorize('isAble',"ProductController@create");
             if(!$this->checkIsDelete(Product::class,$request)){
                $rules=[    
                    "name"=>['required',"unique:products"],
                    "price"=>['required','numeric'],
                    "alert"=>["required","numeric"],
                    "QR"=>["required","unique:products"]
                ];
                $messages =[];
                $attributes=[
                    'name' =>__('product.product_name'),
                    'price' =>__('product.price'),
                    'QR' =>__('product.QR'),
                    'alert' =>__('product.alert'),
                ];
                $request->validate($rules,$messages,$attributes);
                Product::create($request->all());
             }
            
        return redirect()->route('product.index')->with("success", __('Product.success_add'));
    }
    public function edit($id)
    {
        $this->authorize('isAble',"ProductController@update");
        $categories = Category::all();
        $result = Product::with('category')->find($id);
        return view('product.edit',compact('result', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('isAble',"ProductController@update");
        $rules=[    
            "name"=>['required',Rule::unique("products")->ignore($id)],
            "price"=>['required','numeric'],
            "alert"=>["required","numeric"],
            "QR"=>["required",Rule::unique("products")->ignore($id)]
        ];
        $messages =[];
        $attributes=[
            'name' =>__('product.product_name'),
            'price' =>__('product.price'),
            'QR' =>__('product.QR'),
            'alert' =>__('product.alert'),
        ];
        $request->validate($rules,$messages,$attributes);
        Product::find($id)->update($request->all());
        return redirect()->route('product.index')->with('success',__('product.success_update'));
    }
    public function destroy($id)
    {
        $this->authorize('isAble',"ProductController@delete");
        Product::find($id)->update(['isDeleted'=>1]);
        return redirect()->route('products.index')->with('success', __('product.success_delete'));
    }
}
