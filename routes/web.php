<?php

Route::get('', 'PagesController@home')->name('home');

Auth::routes();

Route::get('statuses', 'StatusController@index')->name('statuses');
