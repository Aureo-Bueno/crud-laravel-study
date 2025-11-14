<?php

use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
  return view('home'); // renders resources/views/home.blade.php
})->name('index');

/*
|--------------------------------------------------------------------------
| Clients resource route
|--------------------------------------------------------------------------
| Registers RESTful resource routes for ClientController.
| This single line generates the standard CRUD routes:
|   GET       /clients                  -> index   (clients.index)
|   GET       /clients/create           -> create  (clients.create)
|   POST      /clients                  -> store   (clients.store)
|   GET       /clients/{client}         -> show    (clients.show)
|   GET       /clients/{client}/edit    -> edit    (clients.edit)
|   PUT/PATCH /clients/{client}         -> update  (clients.update)
|   DELETE    /clients/{client}         -> destroy (clients.destroy)
|
| Use this for conventional Create/Read/Update/Delete operations.
| If ClientController type-hints the Client model for route parameters,
| Laravel will apply implicit route model binding for {client}.
*/
Route::resource('clients', ClientController::class);



