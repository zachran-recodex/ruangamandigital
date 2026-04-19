<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/anonymous-stories', [MainController::class, 'storeAnonymousStory'])->name('anonymous-stories.store');
Route::get('/anonymous-stories/{anonymousStory}', [MainController::class, 'showAnonymousStory'])->name('anonymous-stories.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
