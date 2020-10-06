<?php

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
// Route::get('/i', function() {
// 	$order = App\Order::where('id', 42)->first();
// 	return view('admin.orders.invoice', compact('order'));
// });


Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');
Route::get('/search', 'PagesController@search');
Route::get('/category/{id}', 'PagesController@view_category_product');


// Admin Routes start.......................................
Route::get('/admin', 'AdminController@index');
Route::post('/update_admin', 'AdminController@update_admin');
Route::get('/admin/settings', 'AdminController@admin_settings');
Route::get('/add_customer', 'AdminController@add_customer');
Route::get('/customer', 'AdminController@customer');
Route::post('delete_customer/{id}', 'AdminController@delete_customer');
Route::get('/admin_login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');

Route::post('/submit', 'Auth\Admin\LoginController@login');
Route::post('/admin_logout', 'Auth\Admin\LoginController@logout');

Route::get('/admin/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/resetPass', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

Route::get('/admin/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/admin/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');
// Admin Routes end..........................................


// Products Route start..................................
Route::get('/products', 'ProductsController@products');
Route::get('/product/{slug}', 'ProductsController@view_single_product');
// Products Route end.....................................


// Admin Product Routes start.............................................
Route::get('/add_product', 'AdminProductController@add_product');
Route::get('/edit_product/{id}', 'AdminProductController@edit_product');
Route::get('/show_product/{slug}', 'AdminProductController@show_product');
Route::get('/manage_product', 'AdminProductController@manage_product');

Route::post('/save_product', 'AdminProductController@save_product');
Route::post('/update_product/{id}', 'AdminProductController@update_product');
Route::post('/delete_product/{id}', 'AdminProductController@delete_product');
// Admin Product Routes end....................................................


// Order Routes start.............................................
Route::get('/orders', 'OrdersController@index');
Route::get('/view/{id}', 'OrdersController@show');

Route::post('/delete_order/{id}', 'OrdersController@destroy');
Route::post('/completed/{id}', 'OrdersController@completed');
Route::post('/paid/{id}', 'OrdersController@paid');

Route::get('/customer-invoice/{id}', 'CheckoutController@invoice');
Route::get('/invoice/{id}', 'OrdersController@invoice');
// Order Routes end....................................................


// Category Routes start.............................................
Route::get('/categories', 'CategoryController@categories');
Route::get('/add_category', 'CategoryController@add_category');
Route::get('/edit_category/{id}', 'CategoryController@edit_category');
Route::get('/show_category/{id}', 'CategoryController@show_category');
Route::get('/manage_category', 'CategoryController@manage_category');

Route::post('/save_category', 'CategoryController@save_category');
Route::post('/update_category/{id}', 'CategoryController@update_category');
Route::post('/delete_category/{id}', 'CategoryController@delete_category');
// Category Routes end....................................................


// Brand Routes start.............................................
Route::get('/brands', 'BrandController@brands');
Route::get('/add_brand', 'BrandController@add_brand');
Route::get('/edit_brand/{id}', 'BrandController@edit_brand');
Route::get('/show_brand/{id}', 'BrandController@show_brand');
Route::get('/manage_brand', 'BrandController@manage_brand');

Route::post('/save_brand', 'BrandController@save_brand');
Route::post('/update_brand/{id}', 'BrandController@update_brand');
Route::post('/delete_brand/{id}', 'BrandController@delete_brand');
// Brand Routes end....................................................


// Division Routes start.............................................
Route::get('/divisions', 'DivisionController@divisions');
Route::get('/add_division', 'DivisionController@add_division');
Route::get('/edit_division/{id}', 'DivisionController@edit_division');
Route::get('/show_division/{id}', 'DivisionController@show_division');
Route::get('/manage_division', 'DivisionController@manage_division');

Route::post('/save_division', 'DivisionController@save_division');
Route::post('/update_division/{id}', 'DivisionController@update_division');
Route::post('/delete_division/{id}', 'DivisionController@delete_division');
// Division Routes end....................................................


// District Routes start.............................................
Route::get('/districts', 'DistrictController@districts');
Route::get('/add_district', 'DistrictController@add_district');
Route::get('/edit_district/{id}', 'DistrictController@edit_district');
Route::get('/show_district/{id}', 'DistrictController@show_district');
Route::get('/manage_district', 'DistrictController@manage_district');

Route::post('/save_district', 'DistrictController@save_district');
Route::post('/update_district/{id}', 'DistrictController@update_district');
Route::post('/delete_district/{id}', 'DistrictController@delete_district');
// District Routes end....................................................


// User Routes start
Route::get('/verify/{token}', 'VerificationController@verify');
Route::get('/user', 'UserController@index');
Route::get('/settings', 'UserController@settings');
Route::get('/user_carts', 'UserController@user_carts');

Route::post('/update_user', 'UserController@update_user');
// User Routes end


// Cart Routes start
Route::get('/carts_list', 'CartController@index');

Route::post('/carts', 'CartController@store');
Route::post('/cart_update/{id}', 'CartController@update');
Route::post('/cart_delete/{id}', 'CartController@destroy');
// Cart Routes end


// checkout Routes start
Route::get('/checkout', 'CheckoutController@index');

Route::post('/checkout_store', 'CheckoutController@store');
// checkout Routes end


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// API routes

Route::get('get-districts/{id}', function($id){
	return json_encode(App\District::where('division_id', $id)->get());
});

