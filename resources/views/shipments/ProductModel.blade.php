<!-- Modal -->
<div class="modal fade" id="modelEditPS" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Modal title
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modelform" action="{{('/shipmentsPS/'.$shipment->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table" id="products_table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr id="product0">
                <td>
                  <select name="products[]" class="form-control" style="width: 150px;">
                    <option value="">choose product</option>
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
                  <input type="number" name="quantities[]" class="form-control" value="1" style="width: 80px;"/>
                </td>
                <td>
                  <input type="number" name="prices[]" class="form-control" style="width: 90px;" />
                </td>
                <td>
                  <input type="button" value="Delete" class=" btn btn-danger btn-sm" onclick="deleteRow(this)">
              </td>
              </tr>
              <tr id="product1"></tr>
            </tbody>
            <tfoot>
              <tr>
                <button id="add_row" name="add_row" class="btn btn-primary">+ Add Row</button>
              </tr>
            </tfoot>
            <br>
          </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
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
  });
  function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("products_table").deleteRow(i);
}
</script>