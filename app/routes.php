<?php

Route::get('/', 'HomeController@showHome');

Route::get('dnc/check/{phoneNumber}', 'DncController@check');
Route::post('dnc/check/', array('as' => 'apiDncChecker', 'uses' => 'DncController@redirectToChecker'));

// protected routes
Route::group(['before' => 'auth'], function(){
    Route::get('dnc/upload', 'DncController@showUpload');   
    Route::get('dnc/unblock', 'DncController@showUnblock');
    Route::post('dnc/upload', array('as' => 'dncUploader', 'uses' => 'DncController@upload'));    
    Route::post('dnc/unblock', array('as' => 'dncUnblocker', 'uses' => 'DncController@unblock'));

    Route::get('add', 'SessionsController@add');
});

// security routes
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');




