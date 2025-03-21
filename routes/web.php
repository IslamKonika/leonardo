<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


 Route::get('/',[HomeController::class,'home'])->name('home');
 Route::get('/address',[FormController::class,'address'])->name('address');
 Route::get('/form',[FormController::class,'form'])->name('form');
 Route::get('/address-search', [AddressController::class, 'search'])->name('address');



