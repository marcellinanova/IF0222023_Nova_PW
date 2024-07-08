<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SekolahController;

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

// Route resource
Route::resource('/posts', ProgramStudiController::class);
Route::resource('fakultas', FakultasController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
Route::get('/posts', [ProgramStudiController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [ProgramStudiController::class, 'create'])->name('posts.create');
Route::post('/posts', [ProgramStudiController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}/edit', [ProgramStudiController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [ProgramStudiController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [ProgramStudiController::class, 'destroy'])->name('posts.destroy');
Route::get('/fetch-sekolah', [SekolahController::class, 'fetchSekolah']);
Route::get('/sekolah', [App\Http\Controllers\SekolahController::class, 'index']); 