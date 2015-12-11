<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3>Latest products</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                       data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
                                                data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        @foreach($products->take(3) as $product)
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{asset($product->images()->first()->url)}}" class="img-responsive" alt="{{ $product->id }}" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                {{$product->name}}</h5>
                                            <h5 class="price-text-color">
                                                {{ $product->price }}</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm to_cart" data-product-id="{{ $product->id }}">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i>{!! link_to_action('ProductController@show', 'More details', $product->id,[]) !!}</p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        @foreach($products->slice(2,3) as $product)
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{asset($product->images()->first()->url)}}" class="img-responsive" alt="{{ $product->id }}" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                {{$product->name}}</h5>
                                            <h5 class="price-text-color">
                                                {{ $product->price }}</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm to_cart" data-product-id="{{ $product->id }}">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i>{!! link_to_action('ProductController@show', 'More details', $product->id,[]) !!}</p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>