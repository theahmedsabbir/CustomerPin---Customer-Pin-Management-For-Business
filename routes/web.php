<?php

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

Route::get('/', function () {
	if(Auth::guard('admin')->check() == true){
		return redirect()->route('admin.home');
	}
	if(Auth::guard('merchant')->check() == true){
		return redirect()->route('merchant.home');
	}
	if(Auth::guard('officer')->check() == true){
		return redirect()->route('officer.home');
	}
	if(Auth::guard('visitor')->check() == true){
		return redirect()->route('visitor.home');
	}
    return view('welcome');
})->name('root');

// Auth::routes();

Route::middleware('auth')->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
});


// admin routes

Route::namespace('Admin')->prefix('admin')->group(function(){
	Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'LoginController@login')->name('admin.login');


	//password reset routes
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset/', 'ResetPasswordController@reset')->name('admin.password.update');




	Route::middleware('auth:admin')->group(function(){
		Route::get('home', 'HomeController@index')->name('admin.home');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
		Route::post('merchant-login', 'HomeController@merchantLogin')->name('admin.merchantLogin');

		// admin merchants 
		Route::get('merchants', 'HomeController@merchants')->name('admin.merchants');
		Route::get('edit-merchant/{id}', 'HomeController@editMerchant')->name('admin.editMerchant');
		Route::post('update-merchant/{id}', 'HomeController@updateMerchant')->name('admin.updateMerchant');
		Route::get('addMerchant', 'HomeController@addMerchant')->name('admin.addMerchant');
		Route::post('storeMerchant', 'HomeController@storeMerchant')->name('admin.storeMerchant');
		Route::get('merchant/{id}', 'HomeController@merchantShow')->name('admin.merchantShow');
		Route::post('merchantStatus/{id}', 'HomeController@merchantStatus')->name('admin.merchantStatus');


		Route::get('merchant-report/{id}', 'HomeController@merchantReport')->name('admin.merchantReport');
		Route::post('report-show/{id}', 'HomeController@reportShow')->name('admin.reportShow');

		Route::get('editAdmin', 'HomeController@editAdmin')->name('admin.editAdmin');
		Route::post('updateAdmin', 'HomeController@updateAdmin')->name('admin.updateAdmin');

		// pins		
		Route::get('pins/{filter}', 'HomeController@pins')->name('admin.pins');
		Route::post('pins-delete', 'HomeController@pinDel')->name('admin.pinDel');
	});
});


// merchant routes
Route::namespace('Merchant')->prefix('merchant')->group(function(){
	Route::get('login', 'LoginController@showLoginForm')->name('merchant.login');
	Route::post('login', 'LoginController@login')->name('merchant.login');



	//password reset routes
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('merchant.password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('merchant.password.email');
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('merchant.password.reset');
	Route::post('password/reset/', 'ResetPasswordController@reset')->name('merchant.password.update');


	Route::middleware('auth:merchant')->group(function(){
		Route::get('home', 'HomeController@index')->name('merchant.home');
		Route::post('logout', 'LoginController@logout')->name('merchant.logout');
		Route::post('visitor-login', 'HomeController@visitorLogin')->name('merchant.visitorLogin');

		Route::get('officers', 'HomeController@officers')->name('merchant.officers');
		Route::get('addOfficer', 'HomeController@addOfficer')->name('merchant.addOfficer');
		Route::post('storeOfficer', 'HomeController@storeOfficer')->name('merchant.storeOfficer');
		Route::get('officer/{id}', 'HomeController@officerShow')->name('merchant.officerShow');
		Route::get('editOfficer/{id}', 'HomeController@editOfficer')->name('merchant.editOfficer');
		Route::post('updateOfficer/{id}', 'HomeController@updateOfficer')->name('merchant.updateOfficer');
		Route::post('officerStatus/{id}', 'HomeController@officerStatus')->name('merchant.officerStatus');

		Route::get('users', 'HomeController@visitors')->name('merchant.visitors');
		Route::get('addUser', 'HomeController@addVisitor')->name('merchant.addVisitor');
		Route::post('storeUser', 'HomeController@storeVisitor')->name('merchant.storeVisitor');
		Route::get('users/{id}', 'HomeController@visitorShow')->name('merchant.visitorShow');
		Route::get('editUser/{id}', 'HomeController@editVisitor')->name('merchant.editVisitor');
		Route::post('updateUser/{id}', 'HomeController@updateVisitor')->name('merchant.updateVisitor');
		Route::post('userStatus/{id}', 'HomeController@visitorStatus')->name('merchant.visitorStatus');

		Route::get('user-report/{visitorId}', 'HomeController@visitorReport')->name('merchant.visitorReport');
		Route::post('visitor-report-show/{visitorId}', 'HomeController@visitorReportShow')->name('merchant.visitorReportShow');


		Route::get('report', 'HomeController@report')->name('merchant.report');
		Route::post('report-show', 'HomeController@reportShow')->name('merchant.reportShow');


		Route::get('edit-info', 'HomeController@editMerchant')->name('merchant.editMerchant');
		Route::post('update-info', 'HomeController@updateMerchant')->name('merchant.updateMerchant');

		// pins
		Route::get('pins/{filter}', 'HomeController@pins')->name('merchant.pins');
		Route::get('pin-generate', 'HomeController@pinGenerate')->name('merchant.pinGenerate');
		Route::post('pin-store', 'HomeController@pinStore')->name('merchant.pinStore');

	});
});


// officer routes
Route::namespace('Officer')->prefix('officer')->group(function(){
	Route::get('login', 'LoginController@showLoginForm')->name('officer.login');
	Route::post('login', 'LoginController@login')->name('officer.login');

	//password reset routes
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('officer.password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('officer.password.email');
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('officer.password.reset');
	Route::post('password/reset/', 'ResetPasswordController@reset')->name('officer.password.update');


	Route::middleware('auth:officer')->group(function(){
		Route::get('home', 'HomeController@index')->name('officer.home');
		Route::post('logout', 'LoginController@logout')->name('officer.logout');
		Route::post('visitor-login', 'HomeController@visitorLogin')->name('officer.visitorLogin');

		Route::get('users', 'HomeController@visitors')->name('officer.visitors');
		Route::post('userStatus/{id}', 'HomeController@visitorStatus')->name('officer.visitorStatus');
		Route::get('users/{id}', 'HomeController@visitorShow')->name('officer.visitorShow');
		Route::get('editUser/{id}', 'HomeController@editVisitor')->name('officer.editVisitor');
		Route::post('updateUser/{id}', 'HomeController@updateVisitor')->name('officer.updateVisitor');
		Route::get('addUser', 'HomeController@addVisitor')->name('officer.addVisitor');
		Route::post('storeUser', 'HomeController@storeVisitor')->name('officer.storeVisitor');
		Route::get('user-report/{visitorId}', 'HomeController@visitorReport')->name('officer.visitorReport');
		Route::post('report-show/{visitorId}', 'HomeController@reportShow')->name('officer.reportShow');

		// update info
		Route::get('edit-info', 'HomeController@editOfficer')->name('officer.editOfficer');
		Route::post('update-info', 'HomeController@updateOfficer')->name('officer.updateOfficer');

	});
});


// visitor routes
Route::namespace('Visitor')->prefix('user')->group(function(){
	Route::get('login', 'LoginController@showLoginForm')->name('visitor.login');
	Route::post('login', 'LoginController@login')->name('visitor.login');

	//password reset routes
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('visitor.password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('visitor.password.email');
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('visitor.password.reset');
	Route::post('password/reset/', 'ResetPasswordController@reset')->name('visitor.password.update');


	Route::middleware('auth:visitor')->group(function(){
		Route::get('home', 'HomeController@index')->name('visitor.home');
		Route::post('logout', 'LoginController@logout')->name('visitor.logout');


		Route::get('edit-info', 'HomeController@editVisitor')->name('visitor.editVisitor');
		Route::post('update-info', 'HomeController@updateVisitor')->name('visitor.updateVisitor');

		// pins
		Route::get('pin-check', 'HomeController@pinCheck')->name('visitor.pinCheck');
		Route::post('pin-info', 'HomeController@pinInfo')->name('visitor.pinInfo');
		Route::post('use-pin/{id}', 'HomeController@usePin')->name('visitor.usePin');
		Route::get('report', 'HomeController@report')->name('visitor.report');
		Route::post('report-show', 'HomeController@reportShow')->name('visitor.reportShow');
	});
});
