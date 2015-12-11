@extends('...app')

@section('content')


    <div class="jumbotron">
        <h1>Welcome to L5 Shop</h1>
        <p>This is not real shop. Just playing with laravel 5. Check it out</p>
        @if(! Auth::check())
        <p><a class="btn btn-primary btn-lg" href="auth/register" role="button">Learn more</a></p>
        @endif
    </div>

    @include('partials.slider')
@stop