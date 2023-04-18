<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['maintenance', 'cookie']], function () {
	Route::get('/', 'HomeController@index');
	Route::get('{slug}', 'HomeController@show');
	Route::get('kategori/{slug}', 'HomeController@category');
	Route::get('label/{slug}', 'HomeController@label');
	Route::get('search/cari', 'HomeController@search');
	Route::get('page/{slug}', 'HomeController@page');
	Route::get('contact/{slug}', 'HomeController@contact');
	Route::post('contact/contact', 'HomeController@getContact');

	Route::get('kukaradmin/login', 'Auth\AuthController@getLogin');
	Route::post('kukaradmin/login', 'Auth\AuthController@postLogin');
	Route::get('kukaradmin/logout', 'Auth\AuthController@logout');

	Route::group(['middleware' => 'auth'], function () {
		Route::get('kukaradmin/dashboard', ['as'=>'dashboard','uses'=>'AdminController@index']);
		Route::get('kukaradmin/dashboard', ['as'=>'dashboard','uses'=>'AdminController@index']);
		
		Route::resource('kukaradmin/users', 'UsersController');
		Route::get('kukaradmin/users/banned/{id}', 'UsersController@banned');
		Route::get('kukaradmin/users/delete/{id}', 'UsersController@destroy');
		Route::get('kukaradmin/search', 'UsersController@search');
		Route::get('kukaradmin/users/{id}/changepassword', 'UsersController@changepassword');
		Route::post('kukaradmin/users/updatepassword/{id}', ['as' => 'update-password', 'uses' => 'UsersController@updatepassword']);

		Route::resource('kukaradmin/posts', 'PostsController');
		Route::get('kukaradmin/search/posts', ['as'=>'search-posts','uses'=>'PostsController@search']);
		Route::post('kukaradmin/postsavedraft', ['as'=>'post.savedraft','uses'=>'AdminController@saveDraft']);
		Route::get('kukaradmin/posts/delete/{id}', 'PostsController@destroy');

		Route::get('kukaradmin/ajaxcategory', 'PostsController@ajaxcategory');
		Route::get('kukaradmin/ajaxlabel', 'PostsController@ajaxlabel');


		Route::group(['middleware' => 'role:editor'], function () {
			Route::resource('kukaradmin/category', 'CategoryController');
			Route::get('kukaradmin/category/delete/{id}', 'CategoryController@destroy');

			Route::resource('kukaradmin/labels', 'LabelsController');
			Route::get('kukaradmin/labels/delete/{id}', 'LabelsController@destroy');

			Route::resource('kukaradmin/pages', 'PagesController');
			Route::get('kukaradmin/search/pages', ['as'=>'search-pages','uses'=>'PagesController@search']);
			Route::get('kukaradmin/pages/delete/{id}', 'PagesController@destroy');

			Route::resource('kukaradmin/banners', 'BannerController');
			Route::get('kukaradmin/search/banners', ['as'=>'search-banners','uses'=>'BannerController@search']);
			Route::get('kukaradmin/banners/delete/{id}', 'BannerController@destroy');

			Route::resource('kukaradmin/kecamatans', 'KecamatanController');
			Route::get('kukaradmin/search/kecamatans', ['as'=>'search-kecamatan','uses'=>'KecamatanController@search']);
			Route::get('kukaradmin/kecamatans/delete/{id}', 'KecamatanController@destroy');

			Route::get('kukaradmin/sethome', 'SettingController@setHome');
			Route::get('kukaradmin/setcategory', 'SettingController@setCategory');
			Route::get('kukaradmin/setsingle', 'SettingController@setSingle');
			Route::get('kukaradmin/setkecamatan', 'SettingController@setKecamatan');
			Route::get('kukaradmin/setsearch', 'SettingController@search');
			Route::get('kukaradmin/setcategorysearch', 'SettingController@categorySearch');

			Route::get('kukaradmin/savewidget', 'SettingController@saveWidget');
			Route::get('kukaradmin/changeplace', 'SettingController@changePlace');
			Route::get('kukaradmin/changenumber', 'SettingController@changeNumber');
			Route::get('kukaradmin/deletewidget', 'SettingController@deleteWidget');
			Route::get('kukaradmin/saveinput', 'SettingController@saveAds');
			Route::get('kukaradmin/saveadstext', 'SettingController@saveAdsText');
			Route::get('kukaradmin/saveinputcat', 'SettingController@saveCat');
			
			Route::get('kukaradmin/documentation', 'AdminController@documentation');
		});

		Route::group(['middleware' => 'role:administrator'], function () {
			Route::get('kukaradmin/topmenu', 'MenusController@topMenu');
			Route::post('kukaradmin/topmenu/update', 'MenusController@updateTop');
			Route::get('kukaradmin/menu/ajaxpage', 'MenusController@ajaxPage');
			Route::get('kukaradmin/menu/ajaxlink', 'MenusController@ajaxLink');
			Route::get('kukaradmin/menu/ajaxcategory', 'MenusController@ajaxCategory');
			Route::get('kukaradmin/menu/delete', 'MenusController@delete');
			Route::get('kukaradmin/secondmenu', 'MenusController@secondMenu');
			Route::post('kukaradmin/secondmenu/update', 'MenusController@updateSecond');

			Route::resource('kukaradmin/contacts', 'ContactsController');
			Route::get('kukaradmin/search', 'ContactsController@search');
			Route::get('kukaradmin/contacts/delete/{id}', 'ContactsController@destroy');

			Route::get('kukaradmin/setglobal', 'SetGlobalController@setGlobal');
			Route::post('kukaradmin/saveglobal', ['as'=>'kukaradmin.saveglobal','uses'=>'SetGlobalController@saveGlobal']);
			Route::post('kukaradmin/savecontact', ['as'=>'kukaradmin.setcontact.store','uses'=>'SetGlobalController@saveContact']);
			Route::post('kukaradmin/saveemail', ['as'=>'kukaradmin.setemail.store','uses'=>'SetGlobalController@saveEmail']);
			Route::post('kukaradmin/savefooter', ['as'=>'kukaradmin.setfooter.store','uses'=>'SetGlobalController@saveFooter']);
		});
		
		
	});
});


Route::get('test/test', function(){
	return view('test');
});
