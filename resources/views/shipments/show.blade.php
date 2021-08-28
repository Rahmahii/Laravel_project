@extends('layouts.app')
@section('content')
@include('shipments.ShipmentModel',['shipment'=>$shipment,'clients'=>$clients,'carriers'=>$carriers])
@include('shipments.ProductModel',['shipment'=>$shipment,'products'=>$products])

<div class="row mt-2">
  <div class="col-md-9 offset-md-2">
    <div class="card mb-3" style="min-width: 18rem;">

      <div class="card-body">
        <div class="card-title">
          <h4>
            shipment number: {{$shipment['id']}}
          </h4>
        </div>
        @if(!is_null($shipment->client_id))
        <div class="card-text">
          <h5> client :<a href="{{ ('/clients/'.$shipment->client->id)}}">
              {{$shipment->client->fname}} {{$shipment->client->lname}} </a>
          </h5>
        </div>
        @endif
        @if(!is_null($shipment->carrier_id))
        <div class="card-text">
          <h5> carrier :{{$shipment->carrier->name}} </h5>
        </div>
        @endif
        <div class="card-text">
          <h5> Price : {{$shipment->price}} </h5>
        </div>
        <div class="card-text">
          <h5> Weight : {{$shipment->weight}} </h5>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelEditShipment">
          Change client or carrier
        </button>
        <hr>
        <h5>Products : </h5> 
        @foreach($productsS as $product)
        <div class="card-text">
          <h5>- <a href="{{ ('/products/'.$product->product_id )}}">{{$product->quantity}} {{auth()->user()->products()->find($product->product_id)->name}} per piece for {{$product->price}} </a>
            <a onclick="return confirm('Are you sure to delete the product from this shipment?')" href="{{ ('/shipments/'.$product->id.'/'.$shipment->id)}}" class="btn btn-danger btn-sm">delete</a>
          </h5>
        </div>
        @endforeach
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelEditPS">
          Add more product to shipment
        </button> 
        </div>
    </div>
  </div>
</div>

@endsection