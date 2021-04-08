<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Models\House;
use Illuminate\Support\Facades\URL;

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
if (App::environment('production')) {
    URL::forceScheme('https');
}


Route::get('/', function () {
    return view('landing');
});

Route::middleware(['auth'])->group(function (){
    Route::resource('properties',PropertyController::class);
});


Route::get('users', [UsersController::class, 'index']);
Route::get('users/create', [UsersController::class, 'create']);
Route::post('users/create', [UsersController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
