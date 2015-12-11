@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-6 col-md-offset-1">
            <h2><i class="fa fa-desktop"></i> Product {{ $product->name }}</h2>
            <div class="row">
            @foreach($product->images as $image)
                    <div class="col-xs-6 col-md-3">
                        {!! Form::open(['method'=>'delete', 'action'=>['ImageController@destroy', $image->id], 'class'=>'delete']) !!}
                        <!--  form input -->
                        <div class="form-group">
                            {!! Form::hidden('product_id', $product->id) !!}
                            {!! Form::hidden('image_url', $image->url) !!}
                            {!! Form::hidden('image_thumb_url', $image->thumb_url) !!}
                        </div>
                        <button type="submit" class="delete-image"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}

                        <a href="{{ asset($image->url) }}" class="thumbnail" data-lightbox="product-gallery
                            ">
                            <img src="{{ asset($image->url) }}" alt="{{ $image->order }}">
                        </a>
                    </div>
            @endforeach
            </div>
        </div>
    </div>
@stop