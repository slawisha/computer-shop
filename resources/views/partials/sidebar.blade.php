<aside class="col-md-3 admin-aside">
    <h1><i class="fa fa-align-justify"></i> Products</h1>
    <div class="list-group">
        @foreach($categories as $categoryId => $categoryName)
            {!! link_to_action('CategoryProductController@index', $categoryName, [$categoryId],['class' => 'list-group-item']) !!}
        @endforeach
    </div>
</aside>