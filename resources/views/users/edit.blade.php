@extends('layouts.app') 
@section('title', 'edit profile')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit your profile</div>

        <div class="card-body">
          <form action="{{ ('/profileE') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group row">
              <label for="package_id" class="col-md-4 col-form-label text-md-right">package</label>
              <input type="hidden" id="package_id" name="package_id" value="{{$user->package->id}}" class="form-control{{ $errors->has('package_id') ? ' is-invalid' : '' }}">
              <div class="col-md-6">
                <input type="text" id="package_name" name="package_name" value="{{$user->package->name}}">
              </div>
            </div>
            <!-- Name -->
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" autofocus>
              </div>
            </div>

            <!-- Email Address -->
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">email</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}">
              </div>
            </div>

            <!-- Username -->
            <div class="form-group row">
              <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>
              <div class="col-md-6">
                <input id="username" pattern="[a-zA-z0-9_]+" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}">
              </div>
            </div>
            <!-- Password -->


            <!-- phone -->
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

              <div class="col-md-6">
                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone}}">
              </div>
            </div>
            <!-- BirthDate -->
            <div class="form-group row">
              <label for="BirthDate" class="col-md-4 col-form-label text-md-right">{{ __('BirthDate') }}</label>

              <div class="col-md-6">
                <input id="BirthDate" type="date" class="form-control{{ $errors->has('Birthday') ? ' is-invalid' : '' }}" name="BirthDate" value="{{$user->BirthDate }}">
              </div>
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
            <div class="form-group">
              <input type="submit" class="ml-3 btn btn-primary" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection