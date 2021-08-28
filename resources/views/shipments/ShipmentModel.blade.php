<!-- Modal -->
<div class="modal fade" id="modelEditShipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <form id="modelform" action="{{('/shipments/'.$shipment->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <select name="client_id" id="client_id" class="form-control">
            <option value="">-- choose client --</option>
            @foreach ($clients as $client)
            @if($shipment->client_id==$client->id)
            <option selected value="{{ $client->id }}">{{ $client->fname }} {{ $client->lname }}</option>
            @else
            <option value="{{ $client->id }}">{{ $client->fname }} {{ $client->lname }}</option>
            @endif
            @endforeach
          </select>
          <br>
          <select name="carrier_id" id="carrier_id" class="form-control">
            <option value="">-- choose carrier --</option>
            @foreach ($carriers as $carrier)
            @if($shipment->carrier_id==$carrier->id)
            <option selected value="{{ $carrier->id }}">{{ $carrier->name }} ({{ $carrier->price }})</option>
            @else
            <option value="{{ $carrier->id }}">{{ $carrier->name }} ({{ $carrier->price }})</option>
            @endif
            @endforeach
          </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
