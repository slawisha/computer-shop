<?php


Route::get('/', ['as'=>'home', 'uses' => 'PageController@index']);

Route::get('cart', ['as' => 'cart.index', 'uses' => 'CartController@index']);
Route::post('cart', ['as' =>'cart.add', 'uses' => 'CartController@add']);
Route::patch('cart/{productId}', ['as' =>'cart.changeAmount', 'uses' => 'CartController@changeAmount']);
Route::delete('cart/{productId}', ['as' =>'cart.deleteProduct', 'uses' => 'CartController@deleteProduct']);
Route::get('cart/delete',['as'=>'cart.delete', 'uses'=>'CartController@destroy']);

Route::get('payment',['as' => 'payment.index', 'uses' => 'PaymentController@index']);
Route::post('payment', 'PaymentController@pay');

Route::get('order', ['as' => 'order', 'uses' => 'OrderController@index']);
Route::get('order/{orderId}', ['as' => 'order.show', 'uses' => 'OrderController@show']);

Route::get('product/{productId}', 'ProductController@show');

Route::resource('category.products','CategoryProductController', ['only' => 'index']);

Route::group(['prefix' => 'admin','middleware' => 'admin'],  function ()
{
    Route::get('user', ['as'=> 'admin.user.index', 'uses' => 'UserController@index']);
    Route::delete('user/{id}', 'UserController@destroy');
    Route::get('import', ['as'=> 'admin.import', 'uses' => 'ImportController@index']);
    Route::post('import', 'ImportController@store');
    Route::resource('category', 'CategoryController');
    Route::resource('manufacturer', 'ManufacturerController');
    Route::resource('product', 'ProductController', ['except' => 'show']);
    Route::get('product/{id}/images', ['as' => 'admin.product.images', 'uses' => 'ProductController@showProductImages']);
    Route::delete('images/{id}', 'ImageController@destroy');
    Route::get('order', ['as' => 'admin.order', 'uses' => 'OrderController@index']);
    Route::delete('order/{orderId}', 'OrderController@destroy');
});


Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


