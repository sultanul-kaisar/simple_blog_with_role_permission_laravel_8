<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','check_backend_user_status')->group(function() {
    Route::resource('blog', BlogController::class)->except(['show']);

    Route::resource('permission', PermissionController::class,
        [
            'only' => ['index', 'create', 'store']
        ]
    );
    Route::resource('role', RoleController::class);

});
Route::controller(UserController::class)->group(function (){
    Route::get('/user/list', 'UserIndex')->name('user.index');
    Route::get('/user/edit', 'UserEdit')->name('user.edit');
});

require __DIR__.'/auth.php';
