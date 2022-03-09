<?php
namespace App\Http\Controllers;
use App\Http\Requests\RequestAdmin;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     use RegistersUsers;
    public function index()
    {
         $id=Auth::id();
        $results= User::with('type')->where([   ["id","<>",$id ] , ["isDeleted","=",0] ] )->get();
        return view('user.index',compact("results"));
    }
    public function create()
    {
        $types=Type::all();
        return view('user.add',compact('types'));
    }
    public function store(RequestAdmin $request)
    {
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type_id' => $request->type_id,
        ]);
        return redirect()->back()->with('success', 'The User Added Successfully');
    }
    public function show($id)
    {
         $result=User::where('id',$id)->with('type')->get();
         return view('user.show',compact('result'));
    }
    public function edit($id)
    {
          $result=User::find($id);
          $types=Type::all();
          return view('user.edit',compact('result','types'));
    }
    public function update(Request $request, $id)
    {
        User::find($id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'type_id' => $request->type_id,
        ]);
        return redirect()->route("user.index")->with('success', 'The User updated Successfully');
    }
    public function destroy($id)
    {
            User::find($id)->update(['isDeleted'=>1]);
            return redirect()->back()->with('success', 'The User Deleted Successfully');
    }
}
