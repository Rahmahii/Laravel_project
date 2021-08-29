<?php

namespace App\Http\Controllers;

use App\Models\shipment;
use App\Models\Product;
use App\Models\Carrier;
use App\Models\User;
use App\Models\product_shipment;
use Illuminate\Http\Request;
use App\Models\shipment_product;
use Illuminate\Support\Facades\DB;
use Redirect;


class ShipmentController extends Controller
{

  public function index()
  {
    $shipments = auth()->user()->shipments;
    return view('shipments.index', ['shipments' => $shipments]);
  }
  public function show($id)
  {
    $shipment = auth()->user()->shipments()->find($id);
    $PS = DB::table('product_shipment')->where('shipment_id', '=', $id)->get();
      //$productsS = $shipment->products()->firstOrFail()->pivot->get;
    $clients = auth()->user()->clients;
    $products = auth()->user()->products;
    $Carriers = Carrier::all();
    return view('shipments.show', ['shipment' => $shipment, 'products' => $products, 'productsS' => $PS, 'clients' => $clients, 'carriers' => $Carriers]);
  }
  public function create()
  {
    $products = auth()->user()->products;
    $clients = auth()->user()->clients;
    $Carriers = Carrier::all();
    return view('shipments.create', ['products' => $products, 'clients' => $clients, 'carriers' => $Carriers]);
  }


  public function store(Request $request)
  {
    $shipment = new shipment();
    $shipment->user_id = auth()->user()->id;
    $shipment->client_id = $request->client_id;
    $shipment->carrier_id = $request->carrier_id;
    $products = $request->input('products', []);
    $quantities = $request->input('quantities', []);
    $prices = $request->input('prices', []);
    
    if(!empty($products[0])){
    $p = 0;
    $w = 0;
    for ($x = 0; $x < count($products); $x++) {
      $p += $quantities[$x] * $prices[$x];
      $product = auth()->user()->products()->find($products[$x]);
      $w += $quantities[$x] * $product->weight;
    }
    $shipment->price = $p;
    $shipment->weight = $w;
    $shipment->save();
    for ($product = 0; $product < count($products); $product++) {
      if ($products[$product] != '') {
        $shipment->products()->attach($products[$product], ['quantity' => $quantities[$product], 'price' => $prices[$product]]);
      }
    }
  }
    $shipment->save();
    return Redirect::route('shipments')->with('success', 'shipment added successfully!');
  }
  // public function storeShipmentProduct(Request $request, $id)
  // {
  //   $products = $request->products;
  //   $quantity=$request->quantity;
  //   for ($x = 0; $x <count($products); $x++) { 
  //     $shipment = new shipment_product();
  //     $shipment->product_id = $products[$x];
  //     $shipment->shipment_id = $id;
  //     $shipment->quantity = $quantity[$x];
  //     $shipment->save();
  //   }

  // }
  // public function store(Request $request)
  // {
  //   $products = auth()->user()->products;
  //   $shipment = new shipment();
  //   $shipment->user_id = auth()->user()->id;
  //   $shipment->save();
  //   return view('shipments.create', ['products' => $products, 'shipment' => $shipment]);
  // }



  public function edit($id)
  {
    $productsS = auth()->user()->shipments->find($id)->products;
    $clients = auth()->user()->clients;
    $products = auth()->user()->products;
    $Carriers = Carrier::all();
    $shipment = auth()->user()->shipments()->find($id);
    return view('shipments.Edit', ['shipment' => $shipment, 'products' => $products, 'productsS' => $productsS, 'clients' => $clients, 'carriers' => $Carriers]);
  }

  public function updateShipment(Request $request, $id)
  {
    $shipment =  auth()->user()->shipments->find($id);
    $shipment->client_id = $request->client_id;
    $shipment->carrier_id = $request->carrier_id;
    $shipment->save();
    return back()->with('success', 'shipment updated successfully!');
  }
  public function add_PS(Request $request, $id)
  {
    $shipment =  auth()->user()->shipments->find($id);
    $products = $request->input('products', []);
    $quantities = $request->input('quantities', []);
    $prices = $request->input('prices', []);
    $p = $shipment->price;
    $w = $shipment->weight;
    for ($x = 0; $x < count($products); $x++) {
      $p += $quantities[$x] * $prices[$x];
      $product = auth()->user()->products()->find($products[$x]);
      $w += $quantities[$x] * $product->weight;
    }
    $shipment->price = $p;
    $shipment->weight = $w;
    $shipment->save();
    for ($product = 0; $product < count($products); $product++) {
      if ($products[$product] != '') {
        $shipment->products()->attach($products[$product], ['quantity' => $quantities[$product], 'price' => $prices[$product]]);
      }
    }
    return back()->with('success', 'Products added to shipment successfully!');
  }

  public function update_PS(Request $request, $Sid,$PSid){
    $shipment =  auth()->user()->shipments->find($Sid);
    $PS=product_shipment::find($PSid); 
    $old_price = $PS->price*$PS->quantity;

    $old_product=product::find($PS->product_id);
    $old_weight=$old_product->weight*$PS->quantity;
    
    $PS->price=$request->price;
    $PS->product_id=$request->product_id;
    $PS->quantity=$request->quantity;

    $new_price=$request->price*$request->quantity;

    $new_product=product::find($request->product_id);
    $new_weight=$new_product->weight*$request->quantity;

    $shipment->price=$shipment->price-$old_price+$new_price;
    $shipment->weight=$shipment->weight-$old_weight+$new_weight;
    $shipment->save();
    $PS->save();
    return back()->with('success', 'Product in shipment updated successfully!');
  }
  public function destroy($id)
  {
    auth()->user()->shipments()->find($id)->delete();
    return redirect('/shipments')->with('success', 'shipment deleted successfully!');
  }
  public function destroyPS($Pid, $Sid)
  {
    $shipment = auth()->user()->shipments()->find($Sid);
    //$PS = DB::table('product_shipment')->where('product_id', '=', $Pid)->where('shipment_id', '=', $Sid)->get();
    $PS =  $shipment->products()->firstOrFail()->pivot->find($Pid);
    //dd($PS);
    $price=$PS->price;
    $weight=$PS->weight;
    if($PS->delete()){
    $shipment->price = ($shipment->price) - $price;
    $shipment->weight = ($shipment->weight) - $weight;
    $shipment->save();
  }
    return back()->with('success', 'Product deleted from shipment successfully!');
  }
}
