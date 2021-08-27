<?php

namespace App\Http\Controllers;

use App\Models\shipment;
use App\Models\Product;
use App\Models\Carrier;
use App\Models\User;
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
    $products = $shipment->products;
    return view('shipments.show', ['shipment' => $shipment,'products'=>$products]);
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
  {$products = auth()->user()->shipments->find($id)->products;
    $clients = auth()->user()->clients;
    $Carriers = Carrier::all();
    $shipment = auth()->user()->shipments()->find($id);
    return view('shipments.Edit', ['shipment' => $shipment,'products' => $products, 'clients' => $clients, 'carriers' => $Carriers]);
  }

  public function update(Request $request, shipment $shipment)
  {
    
  }

  public function destroy($id)
  {
    auth()->user()->shipments()->find($id)->delete();
    return redirect('/shipments')->with('success','shipment deleted successfully!');
  }
 public function destroyPS($Pid,$Sid){
   $product=DB::table('product_shipment')->where('product_id','=', $Pid)->where('shipment_id','=',$Sid)->get();
   $product->each->delete();
   return back()->with('success', 'Product deleted from shipment successfully!');
 }
}
