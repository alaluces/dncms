<?php

Route::get('/', 'UserController@showHome');
Route::get('login', 'UserController@showLogin');
Route::get('home', 'HomeController@showHome');




