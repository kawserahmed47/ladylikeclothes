<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductUnitController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[FrontendController::class, 'index'] )->name('index');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');
Route::get('/how-to-shop', [FrontendController::class, 'howToShop'])->name('howToShop');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/sign-in', [FrontendController::class, 'login'])->name('sign-in');
Route::get('/shop', [FrontendController::class, 'products'])->name('products');
Route::get('/products-by-category/{slug}', [FrontendController::class, 'productsByCategory'])->name('productsByCategory');
Route::get('/product-details/{slug}', [FrontendController::class, 'productDetails'])->name('productDetails');
Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

Route::get('/payment-method', [FrontendController::class, 'paymentMethod'])->name('payment.method');
Route::get('/money-back-guaranty', [FrontendController::class, 'moneyBackGuaranty'])->name('moneyBackGuaranty');
Route::get('/returns-policy', [FrontendController::class, 'returns'])->name('returnsPolicy');
Route::get('/shipping-information', [FrontendController::class, 'shipping'])->name('shipping');
Route::get('/terms-and-conditions', [FrontendController::class, 'conditions'])->name('conditions');
Route::get('/privacy-policy', [FrontendController::class, 'privacy'])->name('privacy');

Route::get('/track-order', [FrontendController::class, 'trackMyOrder'])->name('trackOrder');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');



	Route::resource('cart', CartController::class);

	Route::get('/cart-remove',[ CartController::class, 'destroy'])->name('cart.remove');
	Route::get('/cart-quantity-update', [CartController::class, 'update'])->name('cart.quantity');
	Route::get('/cart-add-product', [CartController::class, 'addProduct'])->name('cart.addProduct');
	Route::get('/cart-info', [CartController::class, 'cartInfo'])->name('cart.info');
	Route::get('/cart-clear', [CartController::class, 'cartClear' ])->name('cart.cancel');
	Route::get('/sells/receipt/{sell_no}', [SellController::class, 'receipt'])->name('sell.receipt');
	Route::get('/sells/success/{sell_no}', [SellController::class, 'success'])->name('sell.success');
	Route::get('/cart-bar-load', [CartController::class, 'cartBarLoad' ]);

	Route::get('/view-cart', [CartController::class, 'viewCart']);
	Route::get('/view-shop-cart', [CartController::class, 'dynamicCartLoad']);
	Route::get('/checkout', [CartController::class, 'checkout']);

	Route::resource('order', OrderController::class);

	Route::group(['middleware' => 'auth'], function () {
		Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
		Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
		Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
		Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

		
		Route::resource('employee', EmployeeController::class);
		Route::resource('supplier', SupplierController::class);
		Route::resource('customer', CustomerController::class);


		Route::resource('brand', BrandController::class);
		Route::resource('category', CategoryController::class);
		Route::resource('productType', ProductTypeController::class);
		Route::resource('product', ProductController::class);
		Route::resource('productUnit', ProductUnitController::class);
		Route::resource('sell', SellController::class);

		Route::get('all-sells', [SellController::class, 'allSells'])->name('sell.allSells');

		Route::resource('draft', DraftController::class);

		Route::get('all-drafts', [DraftController::class, 'allDrafts'])->name('draft.allDrafts');


		Route::post('order-status-change', [OrderController::class, 'orderStatus']);



});

