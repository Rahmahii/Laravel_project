@extends('layouts.app')
@section('title', 'Edit client')
@section('content')

<div class="row">
  <div class="col-md-9 offset-md-2">
    <h3>edit client</h3>
    <hr> 
    <form action="{{ ('/clients/'.$client->id) }}" method="POST"  enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="form-group">
        <label for="fname">first name</label>
        <input type="text" name="fname" id="fname" class="form-control" value="{{$client->fname}}" >
      </div>
      <div class="form-group">
        <label for="lname">first name</label>
        <input type="text" name="lname" id="lname" class="form-control" value="{{$client->lname}}" >
      </div>

      <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" id="email"  class="form-control" value="{{$client->email}}" >
      </div>
      <div class="form-group">
        <label for="phone">phone</label>
        <input type="tel" name="phone" id="phone" class="form-control" value="{{$client->phone}}" >
      </div>
      <div class="form-group">
        <label for="address">address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="ex:alrehab,alalia" value="{{$client->address}}" >
      </div>
      <div class="form-group">
        <label for="country_id">country_id</label>
        <input type="number" name="country_id" id="country_id" value="{{$client->country_id}}" class="form-control" >
      </div>
      <div class="form-group">
        <label for="city_id">city_id</label>
        <input type="number" name="city_id" id="city_id" value="{{$client->city_id}}" class="form-control" >
      </div>     

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update">
      </div>
    </form>
  </div>
</div>
@endsection