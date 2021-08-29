@extends('layouts.app')
@section('title', 'profile')
@section('content')

<div class="row mt-2">
  <div class="col-md-9 offset-md-2">
    <div class="card mb-3" style="min-width: 18rem;">

      <div class="card-body">
        <div class="card-title">
          <h4 class="font-weight-bold">
           {{$user->name}} informations: 
          </h4>
        </div>
        @if(!is_null($user->package_id))
        <div class="card-text">
         <h5><big class="font-weight-bold">package name: </big> {{$user->package->name}}</h5>
        </div>
        <div class="card-text">
         <h5> <big class="font-weight-bold">package price: </big> {{$user->package->price}} </h5>
        </div>
        @endif
        <div class="card-text">
        <h5>  <big class="font-weight-bold">username: </big>{{$user->username}}</h5>
        </div>
        <div class="card-text">
         <h5> <big class="font-weight-bold">phone: </big>{{$user->phone}} </h5>
        </div>

        <div class="card-text">
         <h5> <big class="font-weight-bold">email: </big>{{$user->email}} </h5>
        </div>

        <div class="card-text">
         <h5> <big class="font-weight-bold"> Birthday:</big> {{$user->BirthDate}}</h5>
        </div>
        
        <hr>
        <small class="text-muted">
          <p>
           <h6> regester date: {{$user->created_at}}</h6>
          </p>
        </small>

        <a href="{{('/Editprofile')}}" class="btn btn-primary float-left mr-2">
          Edit</a>
      </div>
    </div>
  </div>
</div>

@endsection