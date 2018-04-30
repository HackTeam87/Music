<?php

//Admin-Panel-Prefix
Route::prefix('admin')->group(function () {

    Route::resource('/', 'admin\\AdminController');

});

Route::get('/', 'index\\IndexController@index' );

Route::get('/music/{id}', 'index\\IndexController@music' )->name('music');


