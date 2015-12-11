@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-6 col-md-offset-1">
            <h2><i class="fa fa-desktop"></i> Products</h2>

            <div class="panel panel-default">
                <div class="panel-heading">Create Product</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['action'=>'ProductController@store', 'files' => true]) !!}
                        @include('products.partials.form', ['submitButton' => 'Submit'])
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@stop