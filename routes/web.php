<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;
use App\Models\House;

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
    return view('welcome');
});


Route::get('users', [UsersController::class, 'index']);
Route::get('users/create', [UsersController::class, 'create']);
Route::post('users/create', [UsersController::class, 'store']);

Route::resource('properties',PropertyController::class);


Route::get('/dashboard', function () {
    $type = explode('\\',auth()->user()->typeable_type,3)[2];

    switch ($type):
        case 'Tenant':
            return view('users.tenant.index');
        case 'Landlord':
            return view('users.landlord.index');
        case 'Agent':
            return view('users.agent.index');
        default:
            return view('dashboard');
    endswitch;
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
