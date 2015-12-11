@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-4 col-md-offset-1">
            <h2><i class="fa fa-align-justify"></i> Categories</h2>
            <div class="panel panel-default">
                <div class="panel-heading">Edit Category</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($category, ['action'=>['CategoryController@update', $category->id], 'method' => 'PATCH']) !!}
                        <!-- Name form input -->
                        <div class="form-group">
                            {!!Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    <!-- Submit form input -->
                    <div class="form-group">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@stop