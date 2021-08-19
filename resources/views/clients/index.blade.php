@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="row">
        <a href="{{ ('createClient')}}"  class="btn btn-success btn-lg">add client</a>
        <hr style="height:2px;border-width:0;color:White;background-color:White">
        @foreach($clients as $client)
        <div class="col-md-4">
          <div class="card mb-3" style="outline:10px">
            <div class="card-header bg-dark text-white">
              {{$client->fname}} {{$client->lname}}
            </div>
            <div class="card-body">
              <div class="card-title">
               {{$client->country->name}}, {{$client->city->name}}
              </div>
                <a href="{{ ('/clients/'.$client->id)}}" class="btn btn-primary">
                  show more </a>
                <a href="{{ '/clients/' . $client->id.'/delete/'}}" class="btn btn-danger ">
                  Delete</a>
            </div>
          </div>
        </div>
        @endforeach

        @if ($clients->isEmpty())

        <h1>You don't have any clients</h1>
        @endif

      </div>
    </div>
  </div>
</div>

@endsection