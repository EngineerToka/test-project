<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ArtWorkController;



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
    return view('frontend.index');
      });
    Route::resource('collections', CollectionController::class);
    Route::resource('artworks', ArtWorkController::class);
});
