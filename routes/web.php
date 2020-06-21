<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();

Route::get("/admin/login","WebController@loginAdmin")->name("login-admin");
Route::post("/admin/postLogin","WebController@postLoginAdmin")->name("post-login-ad");
Route::get("/admin/logout","WebController@logoutAdmin")->name("logout-ad");

Route::get("/admin/forgot-password","Auth\ForgotPasswordController@getFromRessetPas")->name("form-reset-pas");
Route::post("/admin/forgot-password","Auth\ForgotPasswordController@sendCodeRessetPass");
Route::get("/admin/password/reset","Auth\ForgotPasswordController@resetPassword")->name('link-resetpas');
Route::post("/admin/password/reset","Auth\ForgotPasswordController@saveResetPassword")->name("save-password");


Route::get("/admin/register","WebController@register")->name("register");
Route::post("/admin/save-register","WebController@registerSave")->name("register-save");

include_once ("frontend.php");
Route::group(["prefix"=>"admin","middleware"=>"admin"],function(){
//Route::group(["prefix"=>"admin"],function(){
    Route::get('/','WebController@index')->name("admin");

    //hệ thống cửa hàng
    Route::group(['prefix'=>'store'],function(){
        Route::get('/','StoreController@store')->name('store');


        Route::get('/new','StoreController@newStore')->name('new-store');
        Route::post('/save','StoreController@saveStore');

        Route::get('/edit/{id}','StoreController@edit');
        Route::put('/update/{id}','StoreController@update');

        Route::get('/delete/{id}','StoreController@delete');

        //tim kiem kv
        Route::get('/sear','StoreController@tkHn')->name('kv-hanoi');
        Route::get('/sdanang','StoreController@tkDn')->name('kv-danang');
        Route::get('/shcm','StoreController@tkHcm')->name('kv-hcm');
        Route::get('/skvk','StoreController@tkKvk')->name('kv-khac');
    });
    Route::group(["prefix"=>"account"],function (){
        Route::get("/","AccountController@index")->name("account");
        Route::get("/edit/{id}","AccountController@edit")->name("edit-account");

        Route::get("/edit-pas/{id}","AccountController@editPas");
        Route::put("/save-pas/{id}","AccountController@savePasNew");

        Route::get("/cap-quyen/{id}","AccountController@capQuyenAc");
        Route::put("/update-role/{id}","AccountController@updateQuyenAc");

        Route::put("/update/{id}","AccountController@update");
        Route::get("/customer","AccountController@indexCus")->name("account.customer");

    });
    //hệ thống slide
    Route::group(['prefix'=>'slide'],function (){
        Route::get('/','SlideController@index')->name('slide');

        Route::get('/new','SlideController@new')->name('new-slide');
        Route::post('/save','SlideController@save')->name('save-slide');

        Route::get('/check/{id}','SlideController@check');
        Route::get('/edit/{id}',"SlideController@edit")->name('edit-slide');
        Route::put('/update/{id}',"SlideController@update");

        Route::get('/delete/{id}',"SlideController@delete");

        Route::get("/check-an","SlideController@checkAn")->name("check-status-an");
        Route::get("/check-hien","SlideController@checkHien")->name("check-status-hien");

    });

    //hệ thống tin tức
    Route::group(['prefix'=>'news'],function(){
        Route::get('/','NewController@index')->name('news');
        Route::get('/chi-tiet/{id}','NewController@type')->name('type-news');
        Route::get('/new','NewController@new')->name('new-news');
        Route::post('/save','NewController@save')->name('save-news');
        Route::get('/edit/{id}','NewController@edit');
        Route::put('/update/{id}','NewController@update');
        Route::get('/delete/{id}','NewController@delete');
    });
    //hệ thống loại sản phẩm
    Route::group(['prefix'=>'type_products'],function (){
        Route::get('/','TypePdController@index')->name('type-products');

        Route::get('/new','TypePdController@new')->name('new-type-pd');
        Route::post('/save','TypePdController@save')->name('save-type-pd');

        Route::get('/edit/{id}','TypePdController@edit')->name('edit-type-pd');
        Route::put('/update/{id}','TypePdController@update');
        Route::get('/delete/{id}','TypePdController@delete');
    });
    //hệ thống sản phẩm
    Route::group(['prefix'=>'product'],function (){
        Route::get('/','ProductController@index')->name("products");
        Route::get('/new','ProductController@new')->name("new-products");
        Route::post('/save','ProductController@save')->name("save-products");

        Route::get('/edit/{id}','ProductController@edit')->name("edit-products");
        Route::put('/update/{id}','ProductController@update')->name("update-product");

        Route::get('/delete/{id}','ProductController@delete')->name("delete-product");

        Route::get('/check/{id}','ProductController@check')->name("check-pd");
        Route::get('/check/delete-img/{id}','ProductController@deleteImg');

        //tim kiếm
        Route::post('/timkiem',"ProductController@timkiem")->name("timkiem");
    });
    Route::resource("orders","OrderController");

});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
