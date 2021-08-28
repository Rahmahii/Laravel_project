@extends('layouts.app')

@section('content')

<form action="{{('/shipments')}}" method="POST" id="StoreProductShipment" enctype="multipart/form-data">
  @csrf
  @method('put')

  @if(!is_null($shipment->client_id))
  <div class="card-text">
    <h5> client :<a href="{{ ('/clients/'.$shipment->client->id)}}">
        {{$shipment->client->fname}} {{$shipment->client->lname}} </a>
      <input value="change" class="btn btn-primary btn-sm" onclick="DisplayEdit(1)" ondblclick="DisplayEdit(11)">
    </h5>
  </div>
  @else
  <input value="add client" class="btn btn-primary btn-sm" onclick="DisplayEdit(1)" ondblclick="DisplayEdit(11)">
  @endif
  <div id="E1">
    <label for="client_id">choose shipment's owner :</label>
    <select name="client_id" id="client_id" class="form-control">
      <option value="">-- choose client --</option>
      @foreach ($clients as $client)
      <option value="{{ $client->id }}">{{ $client->fname }} {{ $client->lname }}</option>
      @endforeach
    </select>
  </div>
  <br>
  @if(!is_null($shipment->carrier_id))
  <div class="card-text">
    <h5>
      carrier :{{$shipment->carrier->name}}
      <input value="change" class="btn btn-primary btn-sm" onclick="DisplayEdit(2)" ondblclick="DisplayEdit(22)">
    </h5>
  </div>
  @else
  <input value="add carrier" class="btn btn-primary btn-sm" onclick="DisplayEdit(2)" ondblclick="DisplayEdit(22)">
  @endif
  <br>
  <div id="E2">
    <label for="carrier_id">choose shipment's delivery :</label>
    <select name="carrier_id" id="carrier_id" class="form-control">
      <option value="">-- choose carrier --</option>
      @foreach ($carriers as $carrier)
      <option value="{{ $carrier->id }}">{{ $carrier->name }} ({{ $carrier->price }})</option>
      @endforeach
    </select>
  </div>
  <br>
  @if (!$products->isEmpty())
  <h5>Products : </h5>
  @foreach($productsS as $product)
  <div class="card-text">
    <h5>- <a href="{{ ('/products/'.$product->id)}}">{{$product->name}}</a>
      <a href="{{ ('/shipments/'.$product->id.'/'.$shipment->id)}}" class="btn btn-danger btn-sm" onclick="SaveInSession()">delete</a>
    </h5>
  </div>
  @endforeach
  @endif
  <input value="add products for shipment" class="btn btn-primary btn-sm" onclick="DisplayEdit(3)" ondblclick="DisplayEdit(33)">
  <br><br>
  <div id="E3" class="card">
    <div class="card-header">
      Products
    </div>
    <div class="card-body">
      <table class="table" id="products_table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr id="product0">
            <td>
              <select name="products[]" class="form-control">
                <option value="">-- choose product --</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}">
                  {{ $product->name }} ({{$product->price }}
                  <span>
                    @if(!is_null($product->currency_id))
                    {{$product->currency->name}}
                    @endif</span>)
                </option>
                @endforeach
              </select>
            </td>
            <td>
              <input type="number" name="quantities[]" class="form-control" value="1" />
            </td>
            <td>
              <input type="number" name="prices[]" class="form-control" />
            </td>

          </tr>
          <tr id="product1"></tr>
        </tbody>
        <tfoot>
          <tr>
            <button id="add_row" name="add_row" class="btn btn-default">+ Add Row</button>
            <button id='delete_row' class=" btn btn-danger">- Delete Row</button>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div>
    <input class="btn btn-success" type="submit" value="update shipment">
  </div>
</form>

<script>
  $(document).ready(function () {
    let row_number = 1;
    $("#add_row").click(function (e) {
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function (e) {
      e.preventDefault();
      if (row_number > 1) {
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>

<script>
  document.getElementById("E1").hidden = true;
  document.getElementById("E2").hidden = true;
  document.getElementById("E3").hidden = true;
  function DisplayEdit(x) {
    if (x == "1") {
      document.getElementById("E1").hidden = false;
    } else if (x == "11") {
      document.getElementById("E1").hidden = true;
    } else if (x == "2") {
      document.getElementById("E2").hidden = false;
    } else if (x == "22") {
      document.getElementById("E2").hidden = true;
    } else if (x == "3") {
      document.getElementById("E3").hidden = false;
    } else if (x == "33") {
      document.getElementById("E3").hidden = true;
    }
  }
  function SaveInSession() {
    var e = document.getElementById("products_table");
    sessionStorage.setItem("tableProduct", e);
    document.getElementById("products_table").innerHTML = sessionStorage.getItem("tableProduct");
  }
</script>

@endsection