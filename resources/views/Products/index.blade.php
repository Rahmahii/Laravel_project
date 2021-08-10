@extends('layouts.app')

@section('content')
<h2> List of all Products</h2>
<hr>
<div class="row">
  <div class="col-md-9">
    <div class="row">
      <div class="row">
        <a href="{{ ('createProduct')
          }}" class="btn
          btn-success btn-lg">add
          products</a>
        <hr>
        <select id="select1" onchange="displayDivDemo()">
          <option>filter by:</option>
          <option value="1">price</option>
          <option value="2">Val 2</option>
          <option value="3">Val 3</option>
        </select>
      
        <div id="ff">
          <form action="{{ ('/filter')}}" method="POST" id="filter"
          enctype="multipart/form-data">
          @csrf
          <select id="sign" name="sign" form="filter">
            <option value="g">greater than</option>
            <option value="l" >less than</option>
            <option value="e" >equal</option>
          </select>
          <input type="number" value="enter the price" name="pp">
          <input type="submit" value="filter">
         </form>
        </div>
        <hr>

        <script>
          displayDivDemo();
          function displayDivDemo() {
          document.getElementById("ff").hidden = true;
          if(document.getElementById("select1").value == "1"){
      document.getElementById("ff").hidden = false;
     }
   }
        </script>

        @foreach($products as $product)
        <div class="col-md-4">
          <div class="card
            mb-3"
            style="min-width:
            18rem;">
            <div
              class="card-header
              bg-dark
              text-white">
              {{$product->name}}
            </div>
            <div
              class="card-body">
              <div
                class="card-title">
                <h4>
                  price:
                  {{$product->price}}
                </h4>
              </div>
              <div
                class="card-text">
                {{$product->description}}
              </div>
              <hr>
              <a
                href="{{ '/products/' .$product->id}}"class="btn btn-primary">
                Show More</a>
              <a href="{{ '/products/' . $product->id.'/delete/'}}"
                class="btn btn-danger ">
                Delete</a>

            </div>
          </div>
        </div>
        @endforeach
        @if ($products->isEmpty())

        <h1>You don't have any product</h1>
        @endif

      </div>

    </div>

  </div>

</div>

@endsection