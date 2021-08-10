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
          <hr style="height:2px;border-width:0;color:White;background-color:White">
        <select id="select1" onchange="displayDivDemo()" >
          <option>filter by:</option>
          <option value="1">All</option>
          <option value="2">price</option>
          <option value="3">Date</option>
        </select>
      
        <div id="d1"> <a href="{{ '/products'}}"class="btn btn-danger">all products</a></div>

        <div id="d2">
          <form action="{{ ('/filterPrice')}}" method="POST" id="filterPrice"
          enctype="multipart/form-data">
          @csrf
          <select id="sign" name="sign" form="filterPrice">
            <option value=">">greater than</option>
            <option value="<" >less than</option>
            <option value="=" >equal</option>
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
        <hr style="height:2px;border-width:0;color:White;background-color:White">

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

                <script>
                  displayDivDemo();

                  function displayDivDemo() {
                  document.getElementById("d1").hidden = true;
                  document.getElementById("d2").hidden = true;
                  document.getElementById("d3").hidden = true;

                  if(document.getElementById("select1").value == "1"){
                    document.getElementById("d1").hidden = false;
                  }
                  else if(document.getElementById("select1").value == "2"){
              document.getElementById("d2").hidden = false;
             }else if(document.getElementById("select1").value == "3"){
              document.getElementById("d3").hidden = false;
             }
           }
                </script>
@endsection