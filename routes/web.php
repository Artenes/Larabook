<?php

Route::get('', 'PagesController@home')->name('home');

Auth::routes();

Route::resource('statuses', 'StatusesController');

Route::resource('users', 'UsersController');

Route::get('@{username}', 'UsersController@show')->name('user.profile');

Route::resource('followers', 'FollowsController', ['only' => ['store', 'destroy']]);