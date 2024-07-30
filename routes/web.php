<?php

use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\AddressInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/personal-info', [PersonalInfoController::class, 'store'])->name('personal-info.store');
Route::post('/address-infos', [AddressInfoController::class, 'save'])->name('address-infos.save');

route::get('{any}',function(){
     return view('welcome');
})->where('any','.*');
