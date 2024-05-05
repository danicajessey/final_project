<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get("/", [AdminController::class,'show'])->name('show');

Route::get("/login", [LoginController::class,'login'])->name('login');

Route::get("/create", [AdminController::class,'create'])->name('create');

Route::get("/create2/{id}", [BuyController::class,'create2'])->name('create2');

Route::post("/store", [LoginController::class,'store'])->name('store');

Route::post("/store2", [AdminController::class,'store2'])->name('store2');

Route::post("/store3", [BuyController::class,'store3'])->name('store3');

Route::get('/edit/{id}', [AdminController::class,'edit'])->name('edit');

Route::get('/edit2/{id}', [AdminController::class,'edit2'])->name('edit2');

Route::patch('/update/{id}', [AdminController::class,'update'])->name('update');

Route::put('/update2/{id}', [AdminController::class,'update2'])->name('update2');

Route::delete('/delete/{id}', [AdminController::class,'delete'])->name('delete');

