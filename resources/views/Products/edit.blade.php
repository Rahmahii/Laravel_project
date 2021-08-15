@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-9 offset-md-2">
    <h3>Edit product</h3>
    <hr>
    <form action="{{ ('/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')

      <div class="form-group">
        <label for="name">name</label>
        <input type="text" id="name" class="form-control" value="{{$product->name}}" name="name">
      </div>
      <label for="category_id">Choose a category :</label>
      <br>

      <select id="category_id" name="category_id" form="StoreProduct" class="form-select ">
        @foreach($categories as $category)
        <option value="{{ $category->id }}"> {{ $category->name }}</option>
        @endforeach
      </select>

      <div class="form-group">
        <label for="description">description</label>
        <textarea id="description" cols="30" rows="4" class="form-control" name="description"> {{$product->description}}</textarea>
      </div>


      <div class="form-group">
        <label for="height">height</label>
        <input type="number" id="height" class="form-control" value="{{$product->height}}" name="height">
      </div>
      <div class="form-group">
        <label for="width">width</label>
        <input type="number" id="width" class="form-control" value="{{$product->width}}" name="width">
      </div>
      <div class="form-group">
        <label for="weight">weight</label>
        <input type="number" id="weight" class="form-control" value="{{$product->weight}}" name="weight">
      </div>
      <div class="form-group">
        <label for="depth">depth</label>
        <input type="number" id="depth" class="form-control" value="{{$product->depth}}" name="depth">
      </div>
      <div class="form-group">
        <label for="price">price</label>
        <input type="number" id="price" class="form-control" value="{{$product->price}}" name="price">
      </div>
      <div class="form-group">
        <label for="quantity">quantity</label>
        <input type="number" id="quantity" class="form-control" value="{{$product->quantity}}" name="quantity">
      </div>
      <div class="form-group">
        <label for="image">image</label>
        <input type="file" name="image" id="image" accept="image/*" class="form-control" onchange="loadFile(event)" value="{{$product->image}}">
        @if($product->image)
        <img src="{{asset('images/'.$product['image'])}}" width="100px" height="100px" id="jj">
        @endif
        <p><img id="output" width="200" /></p>

      </div>
      <script>
        var loadFile = function (event) {
          var image = document.getElementById('output');
          image.src = URL.createObjectURL(event.target.files[0]);
          document.getElementById("jj").hidden = true;
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
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>




  </div>
</div>
@endsection