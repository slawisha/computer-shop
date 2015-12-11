@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-8">
            <h2 class="col-md-offset-1"><i class="fa fa-upload"></i> Import Data</h2>
            <div class="panel panel-default col-md-offset-1">
                <div class="panel-heading">Import data from excel spredsheet. Any previous data will be overwritten.</div>
                <div class="panel-body">
                    @include('errors.list')
                    @include('flash::message')
                    {!! Form::open(['action'=>'ImportController@store', 'files' => true]) !!}
                    <!-- Excel-file form input -->
                    <div class="form-group">
                        {!! Form::label('excel-file', 'Choose excel spreadsheet to upload:') !!}
                        {!! Form::file('excel-file', ['class' => 'form-control']) !!}
                    </div>
                    <!-- Submit form input -->
                    <div class="form-group">
                        {!! Form::submit('Import', ['class' => 'btn btn-success form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop