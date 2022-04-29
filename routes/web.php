<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MapController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
// Route::get('/blog-create', [BlogController::class, 'create'])->name('blog.create');
// Route::get('/blog-edit', [BlogController::class, 'edit'])->name('blog.edit');
// Route::get('/blog-create', [BlogController::class, 'create'])->name('blog.create');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
