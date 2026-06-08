<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SourcesController;
use App\Http\Controllers\StatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Route Auth (Login, Register, Logout) HARUS di luar middleware auth
Auth::routes();

//Semua fitur yang butuh login diletakkan di dalam group ini
Route::middleware(['auth'])->group(function () {
    
    // Halaman Statis
    Route::get("/", [PagesController::class, "home"]);
    Route::get("/About", [PagesController::class, "About"]);
    Route::get("/Noteb", [PagesController::class, "Noteb"]);
    Route::get("/Blog", [PagesController::class, "Blog"]);

    //Fitur CRUD Currently
    Route::get('/status/edit', [StatusController::class, 'edit'])->name('status.edit');
    Route::put('/status/update', [StatusController::class, 'update'])->name('status.update');

    // Fitur CRUD My Sources
    Route::get("/Sources", [SourcesController::class, "Sources"]);
    Route::get("/Sources/create", [SourcesController::class, "create"]);
    Route::post("/Sources/store", [SourcesController::class, "store"]);
    Route::delete("/Sources/{id}", [SourcesController::class, "destroy"])->name('sources.destroy');
    Route::get("/Sources/edit/{id}", [SourcesController::class, "edit"]);
    Route::put("/Sources/update/{id}", [SourcesController::class, "update"]);

    // Default Home Laravel 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});