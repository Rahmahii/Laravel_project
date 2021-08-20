<?php

namespace App\Http\Controllers;

use App\Models\shipment;
use Illuminate\Http\Request;
use App\Models\shipment_product;


class ShipmentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }
  public function store(Request $request)
  {
    $products = auth()->user()->products;
    $shipment = new shipment();
    $shipment->user_id = auth()->user()->id;
    $shipment->save();
    return view('shipments.create', ['products' => $products, 'shipment' => $shipment]);
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
    dd($shipment);
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
