@extends('layouts.app')
@section('title', 'create product')
@section('content')

<div class="row">
  <div class="col-md-9 offset-md-2">
    <h3>Add new product</h3>
    <hr>
    <form action="{{__('products')}}" method="POST" id="StoreProduct" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
      </div>
      <label for="category_id">Choose a category :</label>
      <br>

      <select id="category_id" name="category_id" form="StoreProduct" class="form-select ">
        <option value=""> product dosen't has category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}"> {{ $category->name }}</option>
        @endforeach
      </select>

      <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" id="description" value="{{ old('description') }}" cols="10" rows="4" class="form-control"></textarea>
      </div>


      <div class="form-group">
        <label for="height">height</label>
        <input type="number" name="height" id="height" value="{{ old('height') }}" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="width">width</label>
        <input type="number" name="width" id="width" value="{{ old('width') }}" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="depth">depth</label>
        <input type="number" name="depth" id="depth" value="{{ old('depth') }}"class="form-control" required>
      </div>
      <label for="distance_id">Choose an Unit Measure distance:</label>
      <br>
      <select id="distance_id" name="distance_id" form="StoreProduct" class="form-select ">
        @foreach($distances as $distance)
        <option value="{{ $distance->id }}"> {{ $distance->name }}</option>
        @endforeach
      </select>
      <div class="form-group">
        <label for="weight">weight</label>
        <input type="number" name="weight" id="weight" value="{{ old('weight') }}" class="form-control" required>
      </div>
      <label for="mass_id ">Choose an Unit Measure mass:</label>
      <br>
      <select id="mass_id" name="mass_id" form="StoreProduct" class="form-select ">
        @foreach($masses as $mass)
        <option value="{{ $mass->id }}"> {{ $mass->name }}</option>
        @endforeach
      </select>

      <div class="form-group">
        <label for="price">price</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" class="form-control" required>
        <select id="currency_id" name="currency_id" form="StoreProduct">
          @foreach($currencies as $currency)
          <option value="{{ $currency->id }}"> {{ $currency->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="quantity">quantity</label>
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="image">image</label>
        <input type="file" name="image" id="image" value="{{ old('image') }}" accept="image/*" class="form-control" onchange="loadFile(event)" required>
        <p><img id="output" width="200" /></p>
      </div>
      <script>
        var loadFile = function (event) {
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>

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
        <button type="submit" class="btn btn-primary " onclick="RR();">Create</button>
      </div>
    </form>
  </div>
</div>
@include('categories.createModel')
@endsection