<?php

Route::get('/', 'HomeController@showHome');

Route::get('home', 'HomeController@showHome');

Route::post('dnc/check/', 'DncController@redirectToChecker');
Route::get('dnc/check/{phoneNumber}', 'DncController@check');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::get('add', 'SessionsController@add');


