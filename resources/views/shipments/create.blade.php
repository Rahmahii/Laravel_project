@extends('layouts.app')

@section('content')


<form action="{{('/shipments')}}" method="POST" id="StoreProductShipment" enctype="multipart/form-data">
  @csrf

  <label for="client_id">choose shipment's owner :</label>
  <select name="client_id" id="client_id" class="form-control">
    <option value="">-- choose client --</option>
    @foreach ($clients as $client)
    <option value="{{ $client->id }}">{{ $client->fname }} {{ $client->lname }}</option>
    @endforeach
  </select>

  <label for="carrier_id">choose shipment's delivery :</label>
  <select name="carrier_id" id="carrier_id" class="form-control">
    <option value="">-- choose carrier --</option>
    @foreach ($carriers as $carrier)
    <option value="{{ $carrier->id }}">{{ $carrier->name }} ({{ $carrier->price }})</option>
    @endforeach
  </select>
  <hr style="height:2px;border-width:0;color:White;background-color:White;">
  <div class="card">
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
    <input class="btn btn-danger" type="submit" value="Save shipment">
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

@endsection