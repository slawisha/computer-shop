@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-8 col-md-offset-4">
                @include('flash::message')
            </div>
            <h2 class="col-md-offset-1"><i class="fa fa-shopping-cart"></i> Cart</h2>
            @include('errors.list')
            @unless($products)
                <h3 class="col-md-offset-1">Your shopping cart is empty</h3>
            @else
            <table class="table table-bordered col-md-offset-1">
                <tr class="active"><th>Product Name</th><th>Price</th><th>Amount</th><th>Total</th><th></th></tr>
                @foreach($products as $product)
                   <tr>
                       <td class="vcenter">{{ $product[0]->name}}</td>
                       <td class="vcenter">{{ $product[0]->price}}</td>
                       <td>
                       {!! Form::open(['method' => 'PATCH', 'action'=>['CartController@changeAmount', $product[0]->id]]) !!}
                               <!-- Product-amount form input -->
                           <div class="form-group">
                               {!! Form::text('product-amount', $product[1] , ['class' => 'form-control']) !!}
                           </div>
                           <div class="form-group">
                               {!! Form::submit('Change', ['class' => 'btn btn-primary form-control']) !!}
                           </div>

                       {!! Form::close() !!}
                       </td>
                       <td class="vcenter">{{ $product[0]->price * $product[1] }}</td>
                       <td class="vcenter">
                           {!! Form::open(['method' => 'DELETE', 'action'=>['CartController@deleteProduct', $product[0]->id]]) !!}
                           <div class="form-group">
                               {!! Form::submit('Delete', ['class' => 'btn btn-danger form-control']) !!}
                           </div>

                           {!! Form::close() !!}
                       </td>
                   </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>{!! link_to_route('payment.index', 'Proceed with Payment',['total'=>$total], ['class'=>'btn btn-success']) !!}</td>
                    <td>{!! link_to_route('cart.delete', 'Empty Cart', null, ['class'=>'btn btn-danger']) !!}</td>
                    <td>{{ $total }}</td>
                </tr>

            </table>
            @endunless
        </div>
    </div>
@stop