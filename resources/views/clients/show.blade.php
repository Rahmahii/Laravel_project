@extends('layouts.app')
@section('title', 'Show client')
@section('content')

<div class="row mt-2">
  <div class="col-md-9 offset-md-2">
    <div class="card mb-3" style="min-width: 18rem;">

      <div class="card-body">
        <div class="card-title">
          <h4>
            {{$client['fname']}} {{$client['lname']}}
          </h4>
        </div>
       
        <div class="card-text">
          phone:
          {{$client['phone']}}
        </div>
        

        <div class="card-text">
          email:
          {{$client['email']}} 
        </div>

        <div class="card-text">
          address:
          {{$client['address']}}
        </div>
        <div class="card-text">
          country:
          {{$client->country->name}}
        </div>
        <div class="card-text">
          city:
          {{$client->city->name}}
        </div>
        <div class="card-text">
there are {{count($shipments)}} shipments for this client:
<br>
          @foreach($shipments as $shipment)
          <a href="{{ ('/shipments/'.$shipment->id)}}" class="btn btn-outline-info">
           {{$shipment->id}} </a>
          @endforeach
        </div> 
        <hr>
        <small class="text-muted">
          <p>
            {{$client['created_at']}}
          </p>
        </small>

          <a href="{{ ('/clientsEdit/'.$client->id)}}" class="btn btn-primary float-left mr-2">
            Edit </a>

      </div>
    </div>
  </div>
</div>

@endsection