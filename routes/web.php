<?php

Route::get('', 'PagesController@home')->name('home');

Auth::routes();

Route::resource('status', 'StatusController');
