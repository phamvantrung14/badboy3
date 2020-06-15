<?php
Route::get("/account","AccountController@create");
Route::get("/","WebController@indexFrontEnd")->name("trang-chu");
Route::get("/type-pd/{type_products:slug}","WebController@typeProduct");

Route::get("/product-detail/{product:slug}","WebController@productDetail");


Route::get("/list-store","WebController@listStore")->name("store");

Route::group(['prefix'=>'cart'],function (){
    Route::get("view","CartController@view")->name("cart.view");
    Route::get("add/{products}","CartController@add")->name("cart.add");
    Route::get("remove/{id}","CartController@remove")->name("cart.remove");
    Route::get("update/{id}","CartController@update")->name("cart.update");
    Route::get("clear","CartController@clear")->name("cart.clear");
});
Route::group(['prefix'=>'checkout'],function (){
    Route::get('/','CheckoutController@form')->name("checkout");
    Route::post('/','CheckoutController@submit_form')->name("sbcheckout");
});

