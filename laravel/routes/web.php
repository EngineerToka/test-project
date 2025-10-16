<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtWorkController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ArtWorkImagesController;



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
    return view('frontend.index');
      });
    Route::resource('collections', CollectionController::class);
    Route::get('collections/{collection}/artworks', [ArtWorkController::class, 'index'])->name('artworks.index');
    Route::get('collections/{collection}/artworks/create', [ArtWorkController::class, 'create'])->name('artworks.create');
    Route::post('collections/{collection}/artworks', [ArtWorkController::class, 'store'])->name('artworks.store');
    
    Route::resource('artworks', ArtWorkController::class)->except(['index', 'create', 'store']);
    Route::delete('artwork-images/{id}', [ArtWorkImagesController::class, 'deleteOneImage'])->name('artwork-images.destroy');
});
