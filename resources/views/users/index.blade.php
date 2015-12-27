@extends('app')

@section('content')
    <div class="row">
        @include('partials.admin.sidebar')
        <div class="col-md-9">
            <div class="col-md-8 col-md-offset-4">
                @include('flash::message')
            </div>
            <div class="col-md-8 col-md-offset-1">
                <h2><i class="fa fa-user"></i> Users</h2>
            </div>
            @if(!$users->isEmpty())
            <table class="table table-bordered col-md-offset-1">
                <tr class="active"><th>Name</th><th>Action</th></tr>
                @foreach($users as $user)
                    <tr>
                        <td class="col-md-6 vcenter">{{ $user->name }}</td>
                        <td class="vcenter">
                            {!! Form::open(['method'=>'delete', 'action'=>['UserController@destroy', $user->id], 'class'=>'delete']) !!}
                            <button type="submit"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <span class="col-md-offset-1">{!! $users->render() !!}</span>
            @else
                <div class="col-md-8 col-md-offset-1">
                    <h3>No members registered yet</h3>
                </div>
            @endif
        </div>
    </div>
@stop