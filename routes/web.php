<?php

use App\Http\Controllers\AdListingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Models\AdListing;
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


/*
 * Serve web over https
 */
if (App::environment('production')) {
    URL::forceScheme('https');
}

/*
 * Landing page route
 */
Route::get('/', function () {
    $ads = AdListing::paginate(6);
    return view('landing', compact('ads'));
});

Route::middleware(['auth'])->group(function (){
    /*
     * Dashboard route
     */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
     * Property Management routes
     */
    Route::resource('properties',PropertyController::class);

    /*
     * User Management routes
     */
    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/{type}/{user}',[UsersController::class, 'show'])->name('users.show');
    Route::put('users/{type}/{user}',[UsersController::class, 'update'])->name('users.update');

    /*
     * Ad Listing routes
     */
    Route::resource('ad', AdListingController::class);
});



/*
 * Auth routes
 */
require __DIR__.'/auth.php';
