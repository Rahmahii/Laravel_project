@extends('layouts.app')
@section('title', 'shipments')
@section('content')
<div class="container">
  <h2>Shipments</h2>
  <hr>
  <div class="row">
    <div class="col-md-9">
      <div class="row">
        <a href="{{ '/CreateShipments'}}" class="btn btn-success btn-lg">add shipment</a>
        <hr style="height:2px;border-width:0;color:White;background-color:White">
        @foreach($shipments as $shipment)
        <div class="col-md-4">
          <div class="card mb-3" style="outline:10px">
            <div class="card-header bg-dark text-white">
              for:
              @if(!is_null($shipment->client_id))
              {{$shipment->client->fname}} {{$shipment->client->lname}}
              @endif
            </div>
            <div class="card-body">
              <div class="card-title">
                <h4>
                  price:
                  {{$shipment->price}}
                </h4>
              </div>
              <hr>
              <a href="{{ ('/shipments/'.$shipment->id)}}" class="btn btn-primary">
                show more </a>
              <a onclick="return confirm('Are you sure to delete this shipment?')" href="{{ '/shipments/' . $shipment->id.'/delete/'}}" class="btn btn-danger ">
                Delete</a>
            </div>
          </div>
        </div>
        @endforeach

        @if ($shipments->isEmpty())

        <h1>You don't have any shipments</h1>
        @endif

      </div>
    </div>
  </div>
</div>

@endsection