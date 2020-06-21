<?php
Route::get("/account","AccountController@create");
Route::get("/","WebController@indexFrontEnd")->name("trang-chu");
Route::get("/type-pd/{type_products:slug}","WebController@typeProduct");

Route::get("/product-detail/{product:slug}","WebController@productDetail")->name("sanpham.chitiet");

Route::get("/search-pd","WebController@searchProduct");

Route::get("/news","WebController@getNews")->name("trangchu.tintuc");
Route::get("/news-detail/{new}","WebController@getDetailNews")->name("trangchu.chitiet.tintuc");
Route::get("/list-store","WebController@listStore")->name("home.store");

Route::group(['prefix'=>'customer'],function (){
    Route::get("login","CustomerAcController@getLogin")->name("customer.login");
    Route::post("login","CustomerAcController@postLogin")->name("customer.post.login");

    Route::get("logout","CustomerAcController@logout")->name("customer.logout");

    Route::get("register","CustomerAcController@getRegister")->name("customer.register");
    Route::post("save-register","CustomerAcController@saveRegister")->name("customer.save.register");

    Route::get("/donmua/{customer}","CustomerAcController@getDonMua")->name("customer.donmua");
    Route::get("/chitiet-donmua/{order_detail}","CustomerAcController@chiTietDonMua")->name("customer.ctdonmua");

    Route::get("/choxacnhan/{customer}","CustomerAcController@getChoXacNhan")->name("customer.donmua.choxacnhan");
    Route::get("/hoanthanh/{customer}","CustomerAcController@getHoanThanh")->name("customer.donmua.hoanthanh");
    Route::get("/tatca/{customer}","CustomerAcController@getTatCa")->name("customer.donmua.tatca");
    Route::get("/danggiao/{customer}","CustomerAcController@getDangGiao")->name("customer.donmua.danggiao");
    Route::get("/layhang/{customer}","CustomerAcController@getLayHang")->name("customer.donmua.layhang");
    Route::get("/dahuy/{customer}","CustomerAcController@getDaHuy")->name("customer.donmua.dahuy");

    Route::get("/huydon/{customer:id}","CustomerAcController@updateHuyDon");

    Route::get("/profile/{customer}","CustomerAcController@getProfile")->name("customer.donmua.profile");
    Route::post("/profile/{customer}","CustomerAcController@updateProfile")->name("customer.donmua.edit.profile");
});

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

