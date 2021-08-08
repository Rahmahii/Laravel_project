@extends('layouts.app')
@section('content')
<div class="row mt-2">
            <div class="col-md-9 offset-md-2">
                        <div class="card mb-3" style="min-width: 18rem;">

                                    <div class="card-body">
                                                <div class="card-title">
                                                            <h4>
                                                                        {{$product['name']}}</h4>
                                                </div>
                                                <div class="card-text">
                                                            description:
                                                            {{$product['description']}}
                                                </div>
                                                <div class="card-text">
                                                            height:
                                                            {{$product['height']}}
                                                </div>

                                                <div class="card-text">
                                                            width:
                                                            {{$product['width']}}
                                                </div>

                                                <div class="card-text">
                                                            weight:
                                                            {{$product['weight']}}
                                                </div>
                                                <div class="card-text">
                                                            depth:
                                                            {{$product['depth']}}
                                                </div>
                                                <div class="card-text">
                                                            mass:
                                                            {{$product['mass_id']}}
                                                </div>
                                                <div class="card-text">
                                                            distance:
                                                            {{$product['distance_id']}}
                                                </div>
                                                <div class="card-text">
                                                            price:
                                                            {{$product['price']}}
                                                </div>

                                                <div class="card-text">
                                                            quantity:
                                                            {{$product['quantity']}}
                                                </div>
                                                <div class="card-text">
                                                            image:<br><img
                                                                        src="{{asset('images/'.$product['image'])}}"
                                                                        width="100px"
                                                                        height="100px">
                                                </div>

                                                <hr>
                                                <small class="text-muted">
                                                            <p>
                                                                        {{$product['created_at']}}</p>
                                                </small>

                                                <a href="{{ ('/productsEdit/'.$product['id'])}}"
                                                            class="btn btn-primary float-left mr-2">
                                                            Edit</a>

                                    </div>
                        </div>
            </div>
</div>

@endsection