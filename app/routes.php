<?php

Route::get('/', 'HomeController@showHome');

Route::get('home', 'HomeController@showHome');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::get('add', 'SessionsController@add');


