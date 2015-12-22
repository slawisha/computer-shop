@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-8">
            <div class="col-md-8 col-md-offset-1">
                @include('flash::message')
            </div>
            <div class="col-md-8 col-md-offset-1">
                <h2><i class="fa fa-wrench"></i> Manufacturers</h2>
                <a href="{{ route('admin.manufacturer.create') }}">Create new Manufacturer</a>
            </div>

            <table class="table table-bordered col-md-offset-1">
                <tr class="active"><th>Name</th><th>Action</th></tr>
                @foreach($manufacturers as $manufacturer)
                    <tr>
                        <td>{{ $manufacturer->name }}</td>
                        <td>
                            <a href="{{ route('admin.manufacturer.edit', $manufacturer->id) }}" class="edit"><i class="fa fa-pencil-square-o"></i> Edit</a> |
                            {!! Form::open(['method'=>'delete', 'action'=>['ManufacturerController@destroy', $manufacturer->id], 'class'=>'delete']) !!}
                                <button type="submit"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <span class="col-md-offset-1">{!! $manufacturers->render() !!}</span>
        </div>
    </div>
@stop