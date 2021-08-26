@extends('layouts.app')

@section('content')
@include('categories.createModel')
<div class="container">
  <h2>Categories</h2>
  <hr>
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
                <button type="button" onclick="EditModel('{!!$category->name!!}','{!!$category->id!!}');" class="btn btn-primary" data-toggle="modal" data-target="#modelEdit">
                  Edit
                </button>

                <a href="{{ '/categories/' . $category->id.'/delete/'}}" class="btn btn-danger ">
                  Delete</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @include('categories.EditModel')
       

        @if ($categories->isEmpty())

        <h1>You don't have any category</h1>
        @endif

      </div>
    </div>
  </div>
</div>

@endsection