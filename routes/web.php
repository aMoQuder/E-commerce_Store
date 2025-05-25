<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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



Route::group(['middleware' => 'auth'], function () {

    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkoutorder');
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::get('/Detailsproduct{id}', 'ProductController@Details')->name('Detailsproduct');
    Route::get('/shop', 'ProductController@shop')->name('shop');
    Route::post('/contactSave', 'ContactController@save')->name('contactSave');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/event', 'EventsController@index')->name('event');
});


Route::get('/', 'WelcomeController@index')->name('welcome');
Auth::routes();



Route::group(['middleware' => 'CheckAdmin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // -----------------------------order operation-----------------------------
    Route::get('/adminOrders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/deleteOrders{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/adminOrders{order}', [OrderController::class, 'show'])->name('orders.show');
    // -----------------------------order operation-----------------------------


    // -----------------------------product operation-----------------------------
    Route::get('/create', 'ProductController@create')->name('createProduct');
    Route::get('/show{id}', 'ProductController@show')->name('showproduct');
    Route::get('/allproduct', 'ProductController@all')->name('allproduct');
    Route::get('/delete{id}', 'ProductController@delet')->name('deletproduct');
    Route::post('/storeProduct', 'ProductController@store')->name('storeProduct');
    Route::post('/saveProduct', 'ProductController@save')->name('saveProduct');
    Route::get('/updateproduct{id}', 'ProductController@update')->name('updateproduct');
    // -----------------------------product operation-----------------------------

    // -----------------------------category operation-----------------------------
    Route::post('/createCategory', 'CategoryController@store')->name('createCategory');
    Route::get('/addcategory', 'CategoryController@create')->name('addcategory');
    // -----------------------------category operation-----------------------------

    //  ------------------- Start Events opretion ----------------------
    Route::get('EventsCreate', "EventsController@create")->name('events.create');
    Route::post('EventsStore', "EventsController@store")->name('events.store');
    Route::get('EventsDelete{id}', "EventsController@delete")->name('eventsDelete');
    Route::get('EventsEdit{id}', "EventsController@edit")->name('eventsEdit');
    Route::get('EventsShow{id}', "EventsController@show")->name('eventsShow');
    Route::get('blogs', "EventsController@allblog")->name('allblog');
    Route::post('EventsSave', "EventsController@save")->name('events.save');
    //  ------------------- End Events opretion ----------------------

    // -----------------------------users operation-----------------------------
    Route::post('/saveUser', 'UserController@save')->name('saveUser');
    Route::get('/createUser', 'UserController@create')->name('createUser');
    Route::get('/editUser{id}', 'UserController@edit')->name('editUser');
    Route::get('/showUser{id}', 'UserController@show')->name('showUser');
    Route::get('/deletuser{id}', 'UserController@deletuser')->name('deletuser');
    Route::get('/allUser', 'UserController@index')->name('allUser');
    Route::post('/storeUser', 'StoreUserController@store')->name('storeUser');
    // -----------------------------users operation-----------------------------

});
