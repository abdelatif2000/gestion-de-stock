<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\HelperTraits;

class categoryController extends Controller
{
    use HelperTraits;
    public function index(Request $request)
    {
        $this->authorize('isAble', 'CategoryController@index');
        $results = Category::where(['isDeleted' => 0])->orderBy('created_at')->get();
        return view('category.index', compact('results'));
    }
    public function create()
    {
        $this->authorize('isAble', 'CategoryController@create');
        return view('category.add');
    }
    public function store(Request $request)
    {
        $this->authorize('isAble', 'CategoryController@create');
        if (!$this->checkIsDelete(Category::class, $request)){
            $messages = [];
            $rules = ['name' => ['required', 'unique:categories']];
            $attributes = ['name' => __('category.category')];
            $request->validate($rules, $messages, $attributes);
            Category::create($request->all());
        }
        return redirect()->route('category.index')
            ->with('success', __('category.success_add'));
    }
    public function edit($id)
    {
        $this->authorize('isAble', 'CategoryController@update');
        $result = Category::find($id);
        return view('category.edit', compact('result'));
    }
    public function update(Request $request, $id)
    {
        $this->authorize('isAble', 'CategoryController@update');
        $messages = [];
        $rules = ['name' => ['required', Rule::unique('categories', 'name')->ignore($id)]];
        $attributes = ['name' => __('category.category')];
        $request->validate($rules, $messages, $attributes);
        Category::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('category.index')->with('success', __('category.success_update'));
    }
    public function show($id)
    {
        $this->authorize('isAble', 'CategoryController@show');
        $result = Category::select(["id", "name"])
            ->where('id', $id)
            ->with("products")
            ->get()
            ->find($id);
        return view('category.show', compact('result'));
    }

    public function destroy($id)
    {
        $this->authorize('isAble', 'CategoryController@delete');
        Category::find($id)->update(['isDeleted' => 1]);
        return redirect()->route('category.index')->with('success', __('category.success_delete'));
    }
}
