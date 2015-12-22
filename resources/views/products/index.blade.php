@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-9">
            <div class="col-md-8 col-md-offset-4">
                @include('flash::message')
            </div>
            <div class="col-md-8 col-md-offset-1">
                <h2><i class="fa fa-desktop"></i> Products</h2>
                <a href="{{ route('admin.product.create') }}">Create new Product</a>
            </div>
            <table class="table table-bordered col-md-offset-1">
                <tr class="active"><th>Image</th><th>Name</th><th>Action</th></tr>
                @foreach($products as $product)
                    <tr>
                        @if($product->images->count()>0)
                            <td><img src="{{asset($product->images->first()->thumb_url)}}" /></td>
                        @else
                            <td><i class="fa fa-2x fa-camera"></i></td>
                        @endif
                        <td class="col-md-6 vcenter">{{ $product->name }}</td>
                        <td class="vcenter">
                            <a href="{{ route('admin.product.images', $product->id) }}" class="edit"><i class="fa fa-camera"></i> Images</a> |
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="edit"><i class="fa fa-pencil-square-o"></i> Edit</a> |
                            {!! Form::open(['method'=>'delete', 'action'=>['ProductController@destroy', $product->id], 'class'=>'delete']) !!}
                            <button type="submit"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <span class="col-md-offset-1">{!! $products->render() !!}</span>
        </div>
    </div>
@stop