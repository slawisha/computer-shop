@extends('app')

@section('content')
    <div class="row">
        @if(is_admin())
            @include('partials.admin.sidebar')
        @endif
        <div class="col-md-8">
            <div class="col-md-8 col-md-offset-4">
                @include('flash::message')
            </div>
            <h2 class="col-md-offset-1"><i class="fa fa-truck"></i> Orders</h2>
            <table class="table table-bordered col-md-offset-1">
                <tr class="active">
                    <th>Number</th>
                    <th>Active</th>
                    @if(is_admin())
                        <th>User</th>
                        <th>Action</th>
                    @endif
                </tr>
                @foreach($orders as $order)
                    <tr><td>{!!link_to_action('OrderController@show',$order->number,$order->id,[]) !!}</td>
                        <td>
                            @if($order->deleted_at)
                                No
                            @else
                                Yes
                            @endif
                        </td>
                        @if(is_admin())
                            <td>{{ $order->user->name }}</td>
                            <td>
                               {!! Form::open(['method' => 'delete', 'action' => ['OrderController@destroy', $order->id ], 'class' => 'delete']) !!}
                                    <button type="submit"><i class="fa fa-lock"></i> Set Inactive</button>
                               {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop()