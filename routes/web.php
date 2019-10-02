<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return redirect(\route('posts.index'));
});

Route::group(['namespace' => 'Posts'], function () {
    Route::resource('posts', 'PostController');
    Route::get('/posts/{id}/download/', 'PostController@download')->name('post.download');
});
