<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('page-not-found',['as'=>'notfound','uses'=>'HomeController@pagenotfound']);

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
   Route::group(['prefix'=>'author'],function(){
   	  Route::get('index',['as'=>'admin.author.index','uses'=>'Admin\AuthorController@index']);
      Route::get('add',['as'=>'admin.author.getAdd','uses'=>'Admin\AuthorController@getAdd']);
      Route::post('add',['as'=>'admin.author.postAdd','uses'=>'Admin\AuthorController@postAdd']);
      Route::get('delete/{id}',['as'=>'admin.author.getDelete','uses'=>'Admin\AuthorController@delete']);
      Route::get('edit/{id}',['as'=>'admin.author.getEdit','uses'=>'Admin\AuthorController@getEdit']);
      Route::post('edit/{id}',['as'=>'admin.author.postEdit','uses'=>'Admin\AuthorController@postEdit']);
   });

   Route::group(['prefix'=>'cate'],function(){
   	  Route::get('index',['as'=>'admin.cate.index','uses'=>'Admin\CateController@index']);
      Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'Admin\CateController@getAdd']);
      Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'Admin\CateController@postAdd']);
      Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'Admin\CateController@delete']);
      Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'Admin\CateController@getEdit']);
      Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'Admin\CateController@postEdit']);
   });

   Route::group(['prefix'=>'book'],function(){
   	  Route::get('index',['as'=>'admin.book.index','uses'=>'Admin\BookController@index']);
      Route::get('add',['as'=>'admin.book.getAdd','uses'=>'Admin\BookController@getAdd']);
      Route::post('add',['as'=>'admin.book.postAdd','uses'=>'Admin\BookController@postAdd']);
      Route::get('delete/{id}',['as'=>'admin.book.getDelete','uses'=>'Admin\BookController@delete']);
      Route::get('edit/{id}',['as'=>'admin.book.getEdit','uses'=>'Admin\BookController@getEdit']);
      Route::post('edit/{id}',['as'=>'admin.book.postEdit','uses'=>'Admin\BookController@postEdit']);
   });

   Route::group(['prefix'=>'admin'],function(){
   	  Route::get('index',['as'=>'admin.admin.index','uses'=>'Admin\AdminController@index']);
      Route::get('add',['as'=>'admin.admin.getAdd','uses'=>'Admin\AdminController@getAdd']);
      Route::post('add',['as'=>'admin.admin.postAdd','uses'=>'Admin\AdminController@postAdd']);
      Route::get('delete/{id}',['as'=>'admin.admin.getDelete','uses'=>'Admin\AdminController@delete']); 
      Route::get('edit/{id}',['as'=>'admin.admin.getEdit','uses'=>'Admin\AdminController@getEdit']);
      Route::post('edit/{id}',['as'=>'admin.admin.postEdit','uses'=>'Admin\AdminController@postEdit']);     
   });

   Route::group(['prefix'=>'user'],function(){
   	  Route::get('index',['as'=>'admin.user.index','uses'=>'Admin\UserController@index']);
   	  Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'Admin\UserController@delete']);     
   });

   Route::get('dashboard','Admin\DashboardController@index');
   Route::get('logout','Admin\DashboardController@logout');
});
 
   Route::get('admin/login','Admin\LoginController@getLogin');
   Route::post('admin/login','Admin\LoginController@postLogin');


Auth::routes();
Route::get('register/confirm/{token}','Auth\RegisterController@userConfirm');

Route::get('facebook/redirect','Auth\SocialController@redirectToProviderFacebook');
Route::get('facebook/callback','Auth\SocialController@handleProviderCallbackFacebook');

Route::get('google/redirect','Auth\SocialController@redirectToProviderGoogle');
Route::get('google/callback','Auth\SocialController@handleProviderCallbackGoogle');

Route::get('twitter/redirect','Auth\SocialController@redirectToProviderTwitter');
Route::get('twitter/callback','Auth\SocialController@handleProviderCallbackTwitter');

Route::get('/home', 'HomeController@index');


Route::get('profile','ProfileController@index');
Route::get('update-profile/{id}','ProfileController@profile');
Route::post('update-profile/{id}','ProfileController@Update');

Route::get('/contact','ContactController@getContact');
Route::post('/contact','ContactController@postContact');
