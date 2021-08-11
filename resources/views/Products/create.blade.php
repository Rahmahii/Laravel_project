@extends('layouts.app')

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
    
    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
    }
    
    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }
    
    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }
    
    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }
    
    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }
    
    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }
    
    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }
    
    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }
    </style>
@section('content')
<div class="row">
    <div class="col-md-9 offset-md-2">
        <h3>Add new product</h3>
        <hr>
        <form action="{{__('products')}}" method="POST" id="StoreProduct" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <label for="category_id">Choose a category :</label>
            <br>

            <select id="category_id" name="category_id" form="StoreProduct" class="form-select ">
                @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
           
            <div class="form-group">
                <label for="description">description</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
            </div>


            <div class="form-group">
                <label for="height">height</label>
                <input type="number" name="height" id="height" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="width">width</label>
                <input type="number" name="width" id="width" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="depth">depth</label>
                <input type="number" name="depth" id="depth" class="form-control" required>
            </div>
            <label for="distance_id">Choose an Unit Measure distance:</label>
            <br>
            <select id="distance_id" name="distance_id" form="StoreProduct" class="form-select ">
                @foreach($distances as $distance)
                <option value="{{ $distance->id }}"> {{ $distance->name }}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="weight">weight</label>
                <input type="number" name="weight" id="weight" class="form-control" required>
            </div>
            <label for="mass_id ">Choose an Unit Measure mass:</label>
            <br>

            <select id="mass_id" name="mass_id" form="StoreProduct" class="form-select ">
                @foreach($masses as $mass)
                <option value="{{ $mass->id }}"> {{ $mass->name }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="price">price</label>
                <input type="number" name="price" id="price" class="form-control" required>
                <select id="currency_id" name="currency_id" form="StoreProduct">
                    @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}"> {{ $currency->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" name="image" id="image" accept="image/*" class="form-control"
                    onchange="loadFile(event)" required>
                <p><img id="output" width="200" /></p>
            </div>
            <script>
                var loadFile = function (event) {
                    var image = document.getElementById('output');
                    image.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>

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
                <button type="submit" class="btn btn-primary " onclick="RR();">Create</button>
            </div>
        </form>
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



    </div>
</div>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
@endsection