@extends('layouts.app')
@section('content')

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
        <h5>Products : </h5> 
        @foreach($products as $product)
        <div class="card-text">
          <h5>- <a href="{{ ('/products/'.$product->id)}}">{{$product->name}}</a></h5>
        </div>
        @endforeach 
      </div>
      <a href="{{ ('/shipmentsEdit/'.$shipment->id)}}" class="btn btn-primary float-left mr-2">
        Edit</a>
    </div>
  </div>
</div>

@endsection