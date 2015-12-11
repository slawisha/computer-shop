@extends('app')

@section('content')
    <form action="/payment" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="total" value="{{ $total *100 }}">
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_c7nXwNqZxLQN3dr4MpqtKU6L"
                data-amount= {{$total * 100}}
                data-name="L5 Computer Shop"
                data-billingAddress=true
                data-shippingAddress=true
                data-description="total price ${{ $total }}"
                data-image="/128x128.png"
                data-locale="auto">
        </script>
    </form>
@stop