<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminGigController;
use App\Http\Controllers\Admin\AdminOrderController;





use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminDashboardController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/gigs',           [GigController::class, 'index'])->name('gigs.index');
Route::get('/gigs/create',    [GigController::class, 'create'])->middleware('auth')->name('gigs.create');
Route::post('/gigs',          [GigController::class, 'store'])->middleware('auth')->name('gigs.store');

Route::get('/gigs/{gig}/edit',[GigController::class, 'edit'])->middleware('auth')->name('gigs.edit');
Route::put('/gigs/{gig}',     [GigController::class, 'update'])->middleware('auth')->name('gigs.update');
Route::delete('/gigs/{gig}',  [GigController::class, 'destroy'])->middleware('auth')->name('gigs.destroy');

Route::get('/gigs/{slug}',    [GigController::class, 'show'])->name('gigs.show');


Route::get('/dashboard1/mygigs', [GigController::class, 'myGigs'])->middleware('auth');








Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); // My Orders
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store'); // Place order
    Route::get('/sales', [OrderController::class, 'sales'])->name('orders.sales');   // My Sales
});





Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');




Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::delete('/users/{user}', [AdminDashboardController::class, 'destroyUser'])->name('users.destroy');

        // Add these:
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

        Route::get('/gigs', [AdminGigController::class, 'index'])->name('gigs.index');
        Route::delete('/gigs/{gig}', [AdminGigController::class, 'destroy'])->name('gigs.destroy');

        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
    });
