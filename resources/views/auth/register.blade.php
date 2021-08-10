@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register to our wepsite</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="package_id" class="col-md-4 col-form-label text-md-right">{{ __('package') }}</label>
                            <div class="col-md-6">
                                <input id="package_id" type="hidden" name="package_id" value="" class="form-control{{ $errors->has('package_id') ? ' is-invalid' : '' }}" required>
                                <input id="package_name" type="text" readonly><br><small>You have chosen <strong id="pp"></strong> package</small>

                            </div>
                        </div>
                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" pattern="[a-zA-z0-9_]+" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                            </div>
                        </div>
                        <!-- Password -->

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('password_confirmation') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <!-- phone -->
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        <!-- BirthDate -->
                        <div class="form-group row">
                            <label for="BirthDate" class="col-md-4 col-form-label text-md-right">{{ __('BirthDate') }}</label>

                            <div class="col-md-6">
                                <input id="BirthDate" type="date" class="form-control{{ $errors->has('Birthday') ? ' is-invalid' : '' }}" name="BirthDate" value="{{ old('Birthday') }}">
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4  col-sm-10">

                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ml-3 btn btn-primary">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                        <script>
                            document.getElementById("package_id").value = sessionStorage.getItem("ddvalue");
                            document.getElementById("package_name").value = sessionStorage.getItem("ddvalue2");
                            document.getElementById("pp").innerHTML = sessionStorage.getItem("ddvalue2");
                        </script>
@endsection