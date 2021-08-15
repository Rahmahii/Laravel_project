@extends('layouts.app')

@section('content')
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


<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4">
          <div class="card mb-3" style="outline:10px">
            <div class="card-header bg-dark text-white">
              {{$category->name}}
            </div>
            <div class="card-body">
              <div class="card-title">
                <button type="button"  onclick="EditModel('{!!$category->name!!}','{!!$category->id!!}');"  class="btn btn-primary" data-toggle="modal" data-target="#modelEdit">
                Edit
                </button>
               
                <a href="{{ '/categories/' . $category->id.'/delete/'}}" class="btn btn-danger ">
                  Delete</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

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

        @if ($categories->isEmpty())

        <h1>You don't have any category</h1>
        @endif

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

@endsection