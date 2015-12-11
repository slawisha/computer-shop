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
            <h2 class="col-md-offset-1"><i class="fa fa-truck"></i> Order</h2>
            <table class="table table-bordered col-md-offset-1">
                    <tr><th class="active">Number</th><td>{{ $order->number }}</td></tr>
                    <tr><th class="active">Email</th><td>{{ $order->email }}</td></tr>
                    <tr><th class="active">Shipping Name</th><td>{{ $order->shipping_name }}</td></tr>
                    <tr><th class="active">Shipping Address</th><td>{{ $order->shipping_address }}</td></tr>
                    <tr><th class="active">Shipping City</th><td>{{ $order->shipping_city }}</td></tr>
                    <tr><th class="active">Shipping State</th><td>{{ $order->shipping_state }}</td></tr>
                    <tr><th class="active">Shipping Zip</th><td>{{ $order->shipping_zip }}</td></tr>
                    <tr><th class="active">Shipping Country</th><td>{{ $order->shipping_country }}</td></tr>
            </table>
            <h3 class="col-md-offset-1"><i class="fa fa-truck"></i> Order Items</h3>
            <table class="table table-bordered col-md-offset-1">
                <tr class="active"><th>Name</th><th>Amount</th></tr>
                @foreach($order->orderItems as $orderItem)
                    <tr><td>{{ $orderItem->name }}</td><td>{{ $orderItem->amount }}</td></tr>
                @endforeach
            </table>
        </div>
    </div>
@stop()