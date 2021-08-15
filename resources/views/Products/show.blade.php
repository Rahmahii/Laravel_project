@extends('layouts.app')
@section('content')

<div class="row mt-2">
  <div class="col-md-9 offset-md-2">
    <div class="card mb-3" style="min-width: 18rem;">

      <div class="card-body">
        <div class="card-title">
          <h4>
            {{$product['name']}}
          </h4>
        </div>
        @if(!is_null($product->category_id))
        <div class="card-text">
          <h5> <small> category:</small>
            {{$product->category->name}}
          </h5>
        </div>
        @endif
        <div class="card-text">
          description:
          {{$product['description']}}
        </div>
        <div class="card-text">
          height:
          {{$product['height']}} @if(!is_null($product->distance_id))
          {{$product->distance->name}}
          @endif
        </div>

        <div class="card-text">
          width:
          {{$product['width']}} @if(!is_null($product->distance_id))
          {{$product->distance->name}}
          @endif
        </div>

        <div class="card-text">
          weight:
          {{$product['weight']}}
          <span> @if(!is_null($product->mass_id))
            {{$product->mass->name}}
            @endif</span>
        </div>
        <div class="card-text">
          depth:
          {{$product['depth']}} @if(!is_null($product->distance_id))
          {{$product->distance->name}}
          @endif
        </div>
        <div class="card-text">
          price:
          {{$product['price']}}

          <span>
            @if(!is_null($product->currency_id))
            {{$product->currency->name}}
            @endif</span>
        </div>
        <div class="card-text">
          quantity:
          {{$product['quantity']}}
        </div>
        <div class="card-text">
          image:<br><img src="{{asset('images/'.$product['image'])}}" width="100px" height="100px">
        </div>

        <hr>
        <small class="text-muted">
          <p>
            {{$product['created_at']}}
          </p>
        </small>

        <a href="{{ ('/productsEdit/'.$product['id'])}}" class="btn btn-primary float-left mr-2">
          Edit</a>

      </div>
    </div>
  </div>
</div>

@endsection