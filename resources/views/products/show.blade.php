@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2><i class="fa fa-desktop"></i> {{ $product->name }}</h2>
            <div class="row">
                @foreach($product->images as $image)
                    <div class="col-xs-6 col-md-3">
                        <a href="{{ asset($image->url) }}" class="thumbnail" data-lightbox="product-gallery
                            ">
                            <img src="{{ asset($image->thumb_url) }}" alt="{{ $image->order }}" >
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="#" class="to_cart btn btn-primary" data-product-id="{{ $product->id }}">Add to cart</a>
        </div>
        <div class="col-md-6 product-description">
            <table class="table table-bordered col-md-offset-1">
                <tr><th class="active">Manufacturer</th><td>{{ $product->manufacturer->name }}</td></tr>
                <tr><th class="active">Model</th><td>{{ $product->model }}</td></tr>
                <tr><th class="active">Category</th><td>{{ $product->category->name }}</td></tr>
                <tr><th class="active">Processor</th><td>{{ $product->processor }}</td></tr>
                <tr><th class="active">Memory</th><td>{{ $product->memory }}</td></tr>
                <tr><th class="active">Hdd</th><td>{{ $product->hdd }}</td></tr>
                <tr><th class="active">Graphics</th><td>{{ $product->graphics }}</td></tr>
                <tr><th class="active">Screen</th><td>{{ $product->screen }}</td></tr>
                <tr><th class="active">Optical</th><td>{{ $product->optical }}</td></tr>
                <tr><th class="active">Price</th><td>${{ $product->price }}</td></tr>
            </table>
        </div>
    </div>
@stop