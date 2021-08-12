@extends('layouts.app')

@section('content')
<h2>Products</h2>
<div class="container">
<hr>
<div class="row">
  <div class="col-md-9">
    <div class="row">
      <div class="row">
        <a href="{{ ('createProduct')
          }}" class="btn
          btn-success btn-lg">add
          product</a>
        <hr style="height:2px;border-width:0;color:White;background-color:White">
        <select id="select1" onchange="displayDivDemo()">
          <option>filter by:</option>
          <option value="1">All</option>
          <option value="2">price</option>
          <option value="3">Date</option>
          <option value="4">Category</option>
        </select>

        <div id="d2">
          <form action="{{ ('/filterPrice')}}" method="POST" id="filterPrice" enctype="multipart/form-data">
            @csrf
            <select id="sign" name="sign" form="filterPrice">
              <option value=">">greater than</option>
              <option value="<">less than</option>
              <option value="=">equal</option>
            </select>
            <input type="number" value="enter the price" name="pp">
            <input type="submit" value="filter">
          </form>
        </div>
        <div id="d3">
          <form action="{{ ('/filterDate')}}" method="POST" id="filterDate" enctype="multipart/form-data">
            @csrf
            <input type="date" value="enter start date" name="date1">
            <input type="date" value="enter end date" name="date2">
            <input type="submit" value="filter">
          </form>
        </div>
        <div id="d4">
          <form action="{{ ('/filterCategory')}}" method="POST" id="filterCategory" enctype="multipart/form-data">
            @csrf
            <select id="category_id" name="category_id" form="filterCategory" class="form-select ">
              @foreach($categories as $category)
              <option value="{{ $category->id }}"> {{ $category->name }}</option>
              @endforeach
            </select>
            <input type="submit" value="filter">
          </form>
        </div>
        <hr style="height:2px;border-width:0;color:White;background-color:White;">

        @foreach($products as $product)
        <div class="col-md-4">
          <div class="card
            mb-3" style="outline:10px">
            <div class="card-header
            bg-dark
            text-white">
              {{$product->name}}
            </div>
            <div class="card-body">
              <div class="card-title">
                <h4>
                  price:
                  {{$product->price}}
                </h4>
              </div>
              <div class="card-text">
                {{$product->description}}
              </div>
              <hr>
              <a href="{{ '/products/' .$product->id}}" class="btn btn-primary">
                Show More</a>
              <a href="{{ '/products/' . $product->id.'/delete/'}}" class="btn btn-danger ">
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
</div>

<script>
  displayDivDemo();

  function displayDivDemo() {
    var x = document.getElementById("select1");
    document.getElementById("d2").hidden = true;
    document.getElementById("d3").hidden = true;
    document.getElementById("d4").hidden = true;
    if (x.value == "1") {
      window.location.href ="/products";
      // x.children[x.selectedIndex].getAttribute('href');
    }
    else if (x.value == "2") {
      document.getElementById("d2").hidden = false;
    } else if (x.value == "3") {
      document.getElementById("d3").hidden = false;
    } else if (x.value == "4") {
      document.getElementById("d4").hidden = false;
    }
  }
</script>

@endsection