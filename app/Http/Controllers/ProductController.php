<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;
use Redirect;

class ProductController extends Controller
{
  public function categories()
  {
    // $id = auth()->user()->id;
    // return DB::table('categories')->where('user_id', '=', $id)->get();
    return auth()->user()->categories;
  }
  public function index()
  {
    $products = auth()->user()->products;
    return view('products.index', ["products" => $products, "categories" => $this->categories()]);
  }

  public function show($id)
  {
    //$product = auth()->user()->products()->find($id);
    $product = Product::with('Distance', 'Mass', 'Category', 'Currency')->find($id);

    return view('products.show', ["product" => $product]);
  }
  public function store(ProductRequest $request)
  {
    $request->validated();
    $product = new product();
    $this->requests($request, $product)->save();
    return Redirect::route('showproducts', [$product->id])->with('success','product added successfully!');
  }
  public function edit($id)
  {
    $product = auth()->user()->products()->find($id);
    $masses = DB::table('masses')->get();
    $distances = DB::table('distances')->get();
    $currencies = DB::table('currencies')->get();
    return view('products.edit', ["product" => $product, "categories" => $this->categories(), 'masses' => $masses, 'distances' => $distances, 'currencies' => $currencies]);
  }
  public function update(ProductRequest $request, $id)
  {
    $product = auth()->user()->products()->find($id);
    $this->requests($request, $product)->save();
    return Redirect::route('showproducts', [$product->id])->with('success','product updated successfully!');
  }

  public function destroy($id)
  {
    auth()->user()->products()->find($id)->delete();
    return redirect('/products')->with('success','product deleted successfully!');
  }
  public function requests($request, product $product)
  {
    $product->name = $request->name;
    $product->height = $request->height;
    $product->width = $request->width;
    $product->weight = $request->weight;
    $product->depth = $request->depth;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $extention = $file->getClientOriginalExtension();
      $fileName = time() . '.' . $extention;

      $file->move('images', $fileName);
      $product->image = $fileName;
    }
    $product->description = $request->description;
    $product->SKU = $request->SKU;
    $product->mass_id = $request->mass_id;
    $product->distance_id = $request->distance_id;
    $product->category_id = $request->category_id;
    $product->currency_id = $request->currency_id;
    $product->user_id = auth()->user()->id;
    return $product;
  }
  public function filterPrice(Request $request)
  {
    $sign = $request->sign;
    $price = $request->pp;
    $id = auth()->user()->id;
    $Price = DB::table('products')->where('price', $sign, $price)
      ->where('user_id', '=', $id)->get();
    return view('products.index', ["products" => $Price, "categories" => $this->categories()]);
  }
  public function filterDate(Request $request)
  {
    $date1 = $request->date1;
    $date2 = $request->date2;
    $id = auth()->user()->id;
    $Date = DB::table('products')->where('created_at', '>=', $date1)->where('created_at', '<=', $date2)
      ->where('user_id', '=', $id)->get();
    return view('products.index', ["products" => $Date, "categories" => $this->categories()]);
  }
  public function filterCategory(Request $request)
  {
    $category_id = $request->category_id;
    $id = auth()->user()->id;
    $categorys = DB::table('products')->where('category_id', '=', $category_id)
      ->where('user_id', '=', $id)->get();
    return view('products.index', ["products" => $categorys, "categories" => $this->categories()]);
  }
}
