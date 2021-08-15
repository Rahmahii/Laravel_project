<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="antialiased">
  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if(Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      @auth
      <a class="btn btn-warning" role="button" href="{{ url('/dashboard') }}">Dashboard</a> @else
      <a class="btn btn-warning" role="button" href="{{ route( 'login') }} ">Log
        in</a>
    </div>


    <form method="post " action="{{ route( 'register') }} " id="package ">
      @csrf
      <label for="cars ">Choose a package:</label>
      <br>
      <select id="mytext" class="form-select " aria-label="Default select example ">
        @foreach($packages as $package)
        <option value="{{ $package->id }}"> {{ $package->name }}</option>
        @endforeach
      </select>

      <br>
      <div>
        <input type="submit" value="Register" class="btn btn-primary" onclick="passval()">
      </div>
    </form>
    @endauth @endif
  </div>
  </div>
  <script>
    function passval() {
      var e = document.getElementById("mytext");
      var selecttext = e.value;
      var selecttext2 = e.options[e.selectedIndex].text;

      sessionStorage.setItem("ddvalue", selecttext);
      sessionStorage.setItem("ddvalue2", selecttext2);

      return true;
    }
  </script>
</body>

</html>