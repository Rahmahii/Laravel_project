<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
  public function index()
  {
    $category = auth()->user()->categories;
    return view('categories.index', ["categories" => $category]);
  }
  //----------------------------------------------------  
  public function show($id)
  {
    $category = auth()->user()->Categories()->find($id);
    return $category;
  }
  //----------------------------------------------------
  public function store(Request $request)
  {
    $category = new Category();
    $request->validate([
      'name' => 'unique:categories,name,NULL,id,user_id,' .  auth()->user()->id,
      'user_id' => 'unique:categories,user_id,NULL,id,name,' . $request->name,
    ]);
    $category->name = $request->name;
    $category->user_id = auth()->user()->id;
    $category->save();
    return back()->with('success', 'category added successfully!');
    //         if (url()->previous()==url('createProduct')){
    //     return redirect('/createProduct')->with('success','category added successfully!');
    // }elseif(url()->previous()==url('categories')){
    //     return redirect('/categories')->with('success','category added successfully!');;
    // }
  }
  //----------------------------------------------------
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'unique:categories,name,NULL,id,user_id,' .  auth()->user()->id,
      'user_id' => 'unique:categories,user_id,NULL,id,name,' . $request->name,
    ]);
    $category = auth()->user()->Categories()->find($id);
    $category->fill($request->all())->save();
    return redirect('/categories')->with('success', 'category updated successfully!');
  }
  //----------------------------------------------------
  public function destroy($id)
  {
    auth()->user()->Categories()->find($id)->delete();
    return redirect('/categories')->with('success', 'category deleted successfully!');
  }
}
