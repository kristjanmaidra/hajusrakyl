<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CommentsController;
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
//weather
Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');

//map
Route::get('/map', [MapController::class, 'index'])->name('map');

Route::get('/map-add', [MapController::class, 'create'])->name('map.add');
Route::post('/map-add', [MapController::class, 'store']);

Route::get('/map-edit/{map}', [MapController::class, 'edit'])->name('map.edit');
Route::post('/map-edit/{map}', [MapController::class, 'update'])->name('map.update');

Route::post('/map-delete/{map}', [MapController::class, 'destroy'])->name('map.delete');


//blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

//comment
// Route::get('/blog/{blog}/comment-add', [CommentsController::class, 'create']);
// Route::post('/blog/{blog}/comment-add', [CommentsController::class, 'store'])->name('blog.comment.add');

Route::get('/blog', [CommentsController::class, 'index'])->name('blog');

Route::get('/comment-add', [CommentsController::class, 'create'])->name('comment.add');
Route::post('/comment-add', [CommentsController::class, 'store']);


// Route::get('/blog-create', [BlogController::class, 'create'])->name('blog.create');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
