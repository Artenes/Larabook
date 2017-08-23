<?php

Route::get('', 'PagesController@home')->name('home');

Auth::routes();

Route::resource('statuses', 'StatusesController');

Route::resource('users', 'UsersController');
