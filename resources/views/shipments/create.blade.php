@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <form action="{{('/shipments/'.$shipment->id)}}" method="POST" id="StoreProductShipment" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="" class="col-sm-2 form-control-label">Products</label>
              <div class="col-sm-10">
                <!-- <select class="form-control selectpicker" name="products[]" id="products" data-live-search="true" multiple>
                  @foreach($products as $product)
                  <option data-tokens="{{$product->name}}" value="{{$product->id}}">{{$product->name}}</option>
                  @endforeach
                </select> -->
                @foreach($products as $product)
                <input type="checkbox" id="product{{$product}}" name="products[]" value="{{$product->id}}">
                <label for="product{{$product}}"> {{$product->name}}</label>
                <input type="number" max="{{$product->quantity}}" id="quantity{{$product}}" placeholder="quantity" name="quantity[]"><br>
                @endforeach
              </div>
            </div>
            <input type="submit" value="send">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    $('.selectpicker').selectpicker();
  });
</script>
@endsection