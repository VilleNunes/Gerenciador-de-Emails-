<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmailListController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    Auth::loginUsingId(1);
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Email List
    Route::get('/email-list',[EmailListController::class,'index'])->name('emailList.index');
    Route::get('/email-list/create',[EmailListController::class,'create'])->name('emailList.create');
    
    //Subscriber
    Route::get('/subscribers/{emailList}',[SubscriberController::class,'index'])->name('subscribers.index');
    Route::get('/subscribers/create',[SubscriberController::class,'create'])->name('subscribers.create');
});

require __DIR__.'/auth.php';
