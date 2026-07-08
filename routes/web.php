<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/**
 * Route::resource() registra tutte 
 * e sette le tratte RESTful (index, create, store, show, edit, update, destroy) 
 * in un'unica riga. Questo equivale a scrivere manualmente 
 * sette definizioni di percorso individuali. 
 * Laravel mappa ogni percorso al metodo corrispondente in PostController...
 */

Route::resource('posts', PostController::class);

Route::resource('blog', BlogController::class);
