<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\EventController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CreateUserController;
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
    return Inertia::render('Auth/Login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    //fix naming  here
    Route::resource('events', EventController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('users', CreateUserController::class);

});

// Route::any('/{any}', function () {
//     return redirect()->route('login');
// })->where('any', '.*');
    // Route::resource('rooms', RoomController::class)->names([
    //     'index' => 'rooms.index',
    //     'create' => 'rooms.create',
    //     'store' => 'rooms.store',
    //     'show' => 'rooms.show',
    //     'edit' => 'rooms.edit',
    //     'update' => 'rooms.update',
    //     'destroy' => 'rooms.destroy',
    // ]);
// });

// Route::resource('events',EventController::class);
