<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('',                 'WebController@index')->name('index');
Route::get('about',            'WebController@about')->name('about');
Route::get('tenancy_about',    'WebController@tenancy_about')->name('tenancy_about');
Route::get('tenancy_list',     'WebController@tenancy_list')->name('tenancy_list');
Route::get('house_view/{id}',  'WebController@tenancy_view')->name('tenancy_view');
Route::get('tenancy_filter',   'WebController@tenancy_filter')->name('tenancy_filter');
Route::get('sale',             'WebController@sale')->name('sale');
Route::get('condominium',      'WebController@condominium')->name('condominium');
Route::get('contact',          'WebController@contact')->name('contact');
Route::post('contactMail',      'WebController@contactMail')->name('contactMail');
Route::post('interested',       'WebController@interested')->name('interested');

Auth::routes();
Route::middleware('auth')->name('admin.')->group(function () {

    Route::get('admin', function () { return view('admin.index'); })->name('index');

    Route::name('gallery.')->group(function () {
        Route::get('admin/gallery/list/{gallery}', 'GalleryController@index')->name('index');
        Route::delete('admin/gallery/{gallery}', 'GalleryController@destroy')->name('destroy');
        Route::post('admin/gallery', 'GalleryController@store')->name('store');
        Route::put('admin/gallery', 'GalleryController@update')->name('update');
    });

    Route::name('comment.')->group(function () {
        Route::get('admin/comment/list', 'CommentController@index')->name('index');
        Route::delete('admin/comment/{comment}', 'CommentController@destroy')->name('destroy');
        Route::post('admin/comment', 'CommentController@store')->name('store');
        Route::put('admin/comment', 'CommentController@update')->name('update');
        Route::post('admin/comment/avatar', 'CommentController@avatar')->name('avatar');
    });

    Route::resource('admin/tenancy','TenancyController');

});


Route::get('/home', 'HomeController@index')->name('home');
