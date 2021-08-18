<button class="open-button" onclick="openForm()">create category</button>
<div class="form-popup" id="myForm">
  <form action="{{__('categories')}}" class="form-container" method="POST" enctype="multipart/form-data">
    @csrf
    <h3>Create Category</h3>
    <label for="name"><b>name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>
    <button type="submit" class="btn">create</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>
