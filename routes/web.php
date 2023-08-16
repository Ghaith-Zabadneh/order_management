<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserOrderController;
use App\Models\User;
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
    return redirect()->route('login');
});
Route::get('/404_page', function () {
    return view('errors.sorry');
})->name('404_page');

//***************** User Route******************\
Route::middleware(['auth','preventRole:user'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('Backend.user.dashboard');
    })->name('user-dashboard');

    Route::resource('user-order', UserOrderController::class)->except(['index' ,'show']);
});

//***************** Employee Route******************\
Route::middleware(['auth','preventRole:employee'])->group(function () {
    Route::get('/employee-dashboard', function () {
        return redirect()->route('employee-order.index');
    })->name('employee-dashboard');;

    Route::resource('employee-order', EmployeeOrderController::class)->only(['index','store', 'show']);
});

//***************** Admin Route******************\
Route::middleware(['auth','preventRole:admin'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return redirect()->route('admin.index');
    })->name('admin-dashboard');;
    Route::resource('admin', AdminController::class)->except('edit');
    Route::get('get-order', [AdminController::class,'order'])->name('get-order');
});

require __DIR__.'/auth.php';



Route::get('/test', function () {
    dd(User::where('role','user')->pluck('id')->toArray());
    return redirect()->route('login');
});
