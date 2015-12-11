<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">L5 Shop</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">Products <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                       @foreach($categories as $categoryId => $categoryName)
                           <li>{!! link_to_action('CategoryProductController@index', $categoryName, [$categoryId],[]) !!}</li>
                       @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('cart.index') }}"><i class="fa fa-2x fa-shopping-cart"></i><span
                                class="cart-items-number">({{ count(session()->get('products')) }})</span></a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @if (is_admin())
                                <li><a href="{{ url('/admin/import') }}">Dashboard</a></li>
                                <li><a href="{{ url('/admin/order') }}">Orders</a></li>
                            @else
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                <li><a href="{{ url('/order') }}">Orders</a></li>
                            @endif
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>