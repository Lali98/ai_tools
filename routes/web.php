<?php

use App\Http\Controllers\AitoolsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/aitools', [AitoolsController::class, 'store'])->name('aitools.store');
    Route::get('/aitools/create', [AitoolsController::class, 'create'])->name('aitools.create');
    Route::get('/aitools/{id}/edit', [AitoolsController::class,'edit'])->name('aitools.edit');
    Route::patch('/aitools/{id}', [AitoolsController::class,'update'])->name('aitools.update');
    Route::delete('/aitools/{id}', [AitoolsController::class,'destroy'])->name('aitools.destroy');

    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}/edit', [CategoriesController::class,'edit'])->name('categories.edit');
    Route::patch('/categories/{id}', [CategoriesController::class,'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriesController::class,'destroy'])->name('categories.destroy');

    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::get('/tags/{id}/edit', [TagController::class,'edit'])->name('tags.edit');
    Route::patch('/tags/{id}', [TagController::class,'update'])->name('tags.update');
    Route::delete('/tags/{id}', [TagController::class,'destroy'])->name('tags.destroy');
});

require __DIR__.'/auth.php';

Route::get('/aitools', [AitoolsController::class, 'index'])->name('aitools.index');
Route::get('/aitools/{id}', [AitoolsController::class, 'show'])->name('aitools.show');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/{id}', [TagController::class, 'show'])->name('tags.show');
