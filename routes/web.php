<?php

Route::get('/', 'Posts\PostController@index');
Route::post('/store', 'Posts\PostController@store');
Route::delete('/{id}', 'Posts\PostController@destroy');
