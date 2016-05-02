<?php

Route::get('/', 'HomeController@showHome');

Route::get('dnc/check/{phoneNumber}', 'DncController@check');
Route::post('dnc/check/', array('as' => 'apiDncChecker', 'uses' => 'DncController@redirectToChecker'));

// protected routes
Route::group(['before' => 'auth'], function(){
    Route::get('dnc/upload', 'DncController@showUpload');
    
});

// security routes
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

Route::get('add', 'SessionsController@add');


