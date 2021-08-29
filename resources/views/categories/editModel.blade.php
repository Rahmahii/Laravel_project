<!-- Modal -->
 <div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <form id="modelform" action="" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')

          <div class="form-group">
            <label for="name">name</label>
            <input type="text" id="name" class="form-control" value="" name="name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save
          changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function EditModel(name, ID) {
    document.getElementById('modelform').action="/categories/"+ID;
    document.getElementById("name").value = name;    
  }
  </script>