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
    public function getProducts(Request $request){
        //   dd($request->all());
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
   
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
   
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
   
        // Total records
        $totalRecords = Product::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Product::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
   
        // Fetch records
        $records = Product::orderBy($columnName,$columnSortOrder)
          ->where('products.name', 'like', '%' .$searchValue . '%')
          ->select('products.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();
   
        $data_arr = array();
        // dd($records);
        foreach($records as $record){
           $name = $record->name;
           $QR = $record->QR;
           $price = $record->price;
           $alert = $record->alert;
           $data_arr[] = array(
             "QR" => $QR,
             "name" => $name,
             "price" => $price,
             "alert" => $alert,
             "actions"=>"
             <div class='dropdown'>
             <button class='btn btn-secondary dropdown-toggle bg-primary  border-none'
                 type='button' id='dropdownMenuButton' data-toggle='dropdown'
                 aria-expanded='false'>
                 <i class='fas fa-cog'></i>
             </button>
             <div class='dropdown-menu refont-size '
                 aria-labelledby='dropdownMenuButton'>
                     <a class='dropdown-item myLink'
                         data-toggle='modal'
                         data-target='#conformDelete{{$record->id}}'
                     >
                         <i class='far fa-trash-alt mr-1'>
                         </i>".__('public.delete') ."
                     </a>
             
                     <a class='dropdown-item'
                         href='product' >
                         <i class='far fa-edit mr-1'></i>".__('public.update')."</a>
             </div>
         </div>
             "
           );
        }
   
        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );
   
        echo json_encode($response);
        exit;
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
        return redirect()->route('product.index')->with('success', __('product.success_delete'));
    }
}
