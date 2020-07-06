@extends('layouts.master')

@section('content')
<div class="card mb-3" >
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{ $product->image }}" class="card-img" alt="Product image">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <strong class='mb-auto' style="margin-top: 5%;">{{ $product->getPrice() }}</strong>
        <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}" style="display:block;">
            <button type="submit" class="btn btn-dark" style="margin-top: 5%;">Add to cart</button style="display:block;">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
