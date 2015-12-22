@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-8">
            <div class="col-md-8 col-md-offset-4">
            @include('flash::message')
            </div>
        <div class="col-md-8 col-md-offset-1">
            <h2><i class="fa fa-align-justify"></i> Categories</h2>
            <a href="{{ route('admin.category.create') }}">Create new Category</a>
        </div>
        <table class="table table-bordered col-md-offset-1">
            <tr class="active"><th>Name</th><th>Action</th></tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="edit"><i class="fa fa-pencil-square-o"></i> Edit</a> |
                        {!! Form::open(['method'=>'delete', 'action'=>['CategoryController@destroy', $category->id], 'class'=>'delete']) !!}
                            <button type="submit"><i class="fa fa-trash"></i> Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
            <span class="col-md-offset-1">{!! $categories->render() !!}</span>
        </div>
    </div>
@stop