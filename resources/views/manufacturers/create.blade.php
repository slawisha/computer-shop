@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-4 col-md-offset-1">
            <h2><i class="fa fa-wrench"></i> Manufacturers</h2>
            <div class="panel panel-default">
                <div class="panel-heading">Create Manufacturer</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['action'=>'ManufacturerController@store']) !!}
                    <!-- Name form input -->
                    <div class="form-group">
                        {!!Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Submit form input -->
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@stop