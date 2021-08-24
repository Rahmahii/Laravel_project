<?php

namespace App\Http\Controllers;

use App\Models\shipment;
use App\Models\Carrier;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\shipment_product;
use Illuminate\Support\Facades\DB;


class ShipmentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $shipments = Shipment::with('products')->get();
    return view('shipments.index', compact('orders'));
  }
  public function create()
  {
    $products = auth()->user()->products;
    $clients = auth()->user()->clients;
   // $clients =DB::table('clients')->where('user_id', '=',auth()->user()->id)->get();
    $Carriers = Carrier::all();
    return view('shipments.create', ['products' => $products,'clients'=>$clients,'carriers'=>$Carriers]);
  }

  // public function store(Request $request)
  // {
  //   $products = auth()->user()->products;
  //   $shipment = new shipment();
  //   $shipment->user_id = auth()->user()->id;
  //   $shipment->save();
  //   return view('shipments.create', ['products' => $products, 'shipment' => $shipment]);
  // }
  public function store(Request $request)
  {
    $shipment = new shipment();
      $shipment->user_id = auth()->user()->id;
      $shipment->client_id = $request->client_id;
      $shipment->carrier_id = $request->carrier_id;
      
      $products = $request->input('products', []);
      $quantities = $request->input('quantities', []);
      $prices = $request->input('prices', []);
      $shipment->save();
      for ($product=0; $product < count($products); $product++) {
        if ($products[$product] != '') {
          $shipment->products()->attach($products[$product], ['quantity' => $quantities[$product],'price' => $prices[$product]]);
        }
      }
      // $shipment->price= DB::table('shipments_products')->where('shipment_id' '=' $shipment->id)->sum('balance'); 
      // $shipment->weight; 
      // $shipment->save();
  
      return redirect('/shipments')->with('success', 'shipment added successfully!');
  }
  public function storeShipmentProduct(Request $request, $id)
  {
    $products = $request->products;
    $quantity=$request->quantity;
    for ($x = 0; $x <count($products); $x++) { 
      $shipment = new shipment_product();
      $shipment->product_id = $products[$x];
      $shipment->shipment_id = $id;
      $shipment->quantity = $quantity[$x];
      $shipment->save();
    }
   
  }
  /**
   * Display the specified resource.
   *
   * @param  \App\Models\shipment  $shipment
   * @return \Illuminate\Http\Response
   */
  public function show(shipment $shipment)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\shipment  $shipment
   * @return \Illuminate\Http\Response
   */
  public function edit(shipment $shipment)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\shipment  $shipment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, shipment $shipment)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\shipment  $shipment
   * @return \Illuminate\Http\Response
   */
  public function destroy(shipment $shipment)
  {
    //
  }
}
