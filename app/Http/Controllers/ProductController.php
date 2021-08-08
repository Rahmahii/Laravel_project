<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = auth()->user()->products;
        return view('products.index', ["products" => $products]);
    }

    public function show($id)
    {
        $product = auth()->user()->products()->find($id);
        return view('products.show', ["product" => $product]);
    }
    public function store(ProductRequest $request)
    {
       $request->validated();
        $product = new product();
        $this->requests($request, $product)->save();
        return $this->show($product->id);
    }
    public function Getupdate($id)
    {
        $product = auth()->user()->products()->find($id);

        return view('products.edit', ["product" => $product]);
    }
    public function update(ProductRequest $request, $id)
    {
        $product = auth()->user()->products()->find($id);
         $this->requests($request, $product)->save();
         return $this->show($id);
    }

    public function destroy( $id)
    {
         auth()->user()->products()->find($id)->delete();
        return redirect('/products');

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
        $product->mass_id=$request->mass_id;
        $product->distance_id=$request->distance_id;
        $product->user_id = auth()->user()->id;
        return $product;
    }
}
