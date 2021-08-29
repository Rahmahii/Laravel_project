<!-- Modal -->
<div class="modal fade" id="modelEditOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <form id="modelform2" action="" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table" id="products_table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <select id="product_id" name="product_id"class="form-control" style="width: 200px;">
                    <option value="">choose product</option>
                    @foreach ($products as $product)
                
                    <option  value="{{ $product->id }}">
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
                  <input type="number" id="quantity" name="quantity" class="form-control" value="" />
                </td>
                <td>
                  <input type="number" id="price" name="price" class="form-control" value="" />
                </td>
    
              </tr>
            </tbody>
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
  function PSEditModel(price, quantity ,PSid, Sid,Pid) {
    document.getElementById('modelform2').action="/updateShipmentsPS/"+Sid+"/"+PSid;
    document.getElementById("price").value = price; 
    document.getElementById("quantity").value = quantity; 
    
    var selId = document.getElementById("product_id");
       selId.value = Pid;//Set the selected option to 2, which is Option 2
  }
  </script>