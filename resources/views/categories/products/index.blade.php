@extends('app')

@section('content')
    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9">

            <h2 class="col-md-offset-1"><i class="fa fa-desktop"></i> {{ $categoryName }}</h2>
            <table class="table table-bordered col-md-offset-1">
                <tr class="active"><th>Image</th><th>Name</th><th>Price</th><th></th></tr>
                @foreach($products as $product)
                    <tr>
                        @if($product->images->count()>0)
                            <td><img src="{{asset($product->images->first()->thumb_url)}}" /></td>
                        @else
                            <td><i class="fa fa-2x fa-camera"></i></td>
                        @endif
                        <td class="col-md-6 vcenter">{!! link_to_action('ProductController@show', $product->name, [$product->id])  !!}</td>
                        <td class="vcenter">{{ $product->price }} </td>
                        <td class=" vcenter"><a href="#" class="to_cart btn btn-primary" data-product-id="{{ $product->id }}">Add to cart</a></td>
                    </tr>
                @endforeach
            </table>
            <span class="col-md-offset-1">{!! $products->render() !!}</span>

        </div>
    </div>
@stop