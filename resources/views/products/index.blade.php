@extends('layouts.master')

@section('content')
<div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
        @foreach(App\Category::all() as $category)
        <a class="p-2 text-muted" href="{{ route('products.index', ['categorie' =>
        $category->slug]) }}">{{ $category->name }}</a>
        @endforeach
        </nav>
    </div>

<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-responsive" src="/images/watch.jpg" alt="Smart Home"/>
            <div class="container">
            <div class="carousel-caption text-left">
                <h1>Smart Store</h1>
                <p>Life is hard enough already. Let us make it a little easier.
                <br> Sign up for better exerience. </p>
                <p><a class="btn btn-lg btn-info" href="#" role="button">Sign up today</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-responsive" src="/images/ears.jpg" alt="Smart objects">
            <div class="container">
            <div class="carousel-caption">
                <h1>No more slow shopping.</h1>
                <p>Rediscover a great shopping tradition.</p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-responsive" src="/images/phone.jpg" alt="Smart watch">
            <div class="container">
            <div class="carousel-caption text-right">
                <h1>Always in style!</h1>
                <p>The good life at a great price.</p>
            </div>
            </div>
        </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button"
        data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button"
        data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>




    @foreach($products as $product)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-info">
                    @foreach ($product->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </strong>
                <h5 class="mb-0">{{ $product->title }}</h5>
                <p class="mb-auto text-muted">{{ $product->subtitle }}</p>
                <strong class="mb-auto font-weight-normal text-secondary">{{ $product->getPrice() }}</strong>
                <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-secondary">View details</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{ $product->image }}" alt="">
            </div>
            </div>
        </div>
    @endforeach

    {{ $products->appends(request()->input())->links() }}
@endsection


