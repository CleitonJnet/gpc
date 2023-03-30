<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('index'); })->name('home');
Route::get('/sobre', function () { return view('about'); })->name('about');
Route::get('/locacao', function () { return view('tenancy'); })->name('tenancy');
Route::get('/venda', function () { return view('sale'); })->name('sale');
Route::get('/condominio', function () { return view('condominium'); })->name('condominium');
Route::get('/contato', function () { return view('contact'); })->name('contact');
