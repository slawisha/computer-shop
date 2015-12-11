@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-7 col-md-offset-1">
            <h2><i class="fa fa-desktop"></i> Products</h2>

            <div class="panel panel-default">
                <div class="panel-heading">Edit Product</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($product, ['action'=>['ProductController@update', $product->id], 'method'=>'PATCH', 'files' => true]) !!}
                        @include('products.partials.form', ['submitButton' => 'Update'])
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@stop