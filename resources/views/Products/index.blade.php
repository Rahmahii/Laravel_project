@extends('layouts.app')

@section('content')
<h2> List of all Products</h2>
<hr>
<div class="row">
            <div class="col-md-9">
                        <div class="row">
                                    <div class="row">
                                                <a href="{{ ('createProduct')
                                                            }}" class="btn
                                                            btn-success btn-lg">add
                                                            products</a>
                                                @foreach($products as $product)
                                                <div class="col-md-4">
                                                            <div class="card
                                                                        mb-3"
                                                                        style="min-width:
                                                                        18rem;">
                                                                        <div
                                                                                    class="card-header
                                                                                    bg-dark
                                                                                    text-white">
                                                                                    {{$product->name}}
                                                                        </div>
                                                                        <div
                                                                                    class="card-body">
                                                                                    <div
                                                                                                class="card-title">
                                                                                                <h4>
                                                                                                            price:
                                                                                                            {{$product->price}}
                                                                                                </h4>
                                                                                    </div>
                                                                                    <div
                                                                                                class="card-text">
                                                                                                {{$product->description}}
                                                                                    </div>
                                                                                    <hr>
                                                                                    <a
                                                                                                href="{{ '/products/' .$product->id}}"class="btn btn-primary">
                                                                                                Show More</a>
                                                                                     <a href="{{ '/products/' . $product->id.'/delete/'}}"
                                                                                                class="btn btn-danger ">
                                                                                                Delete</a>
                                                                                    
                                                                        </div>
                                                            </div>
                                                </div>
                                                @endforeach
                                                @if ($products->isEmpty())

                                                <h1>You don't have any product</h1>
                                                @endif

                                    </div>

                        </div>

            </div>

</div>

@endsection