<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\UserDataController;
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

Route::get('/verify', function () {
    return view('verify');
})->name('age_verification');

Route::post('/set-age-cookie', function () {
    if (!request()->input('age_verification')) return;

    return Redirect::to('/')->cookie('age_verified', true, 60 * 1);
});

Route::get('/', function () {
    return view('welcome');
})->middleware(['age_verification'])->name('welcome');

Route::get("/upload", function () {
    return view('upload');
})->middleware(['age_verification', 'auth']);

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'user' => $request->user()
    ]);
})->middleware(['auth', 'verified', 'age_verification'])->name('dashboard');

Route::get('/user/{user}', [ProfileController::class, 'view'])
    ->name('profile.view')
    ->middleware(['profile_views']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/userdata', [UserDataController::class, 'update'])->name('userdata.update');
});

require __DIR__.'/auth.php';
