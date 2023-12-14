<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\saleController;
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
    return view('Backend.Pages.Dashboard.index');
})->name('home');

Route::get('/sale/list',[saleController::class,'index'])->name('sale.list');

Route::get('/sale/create',[saleController::class,'create'])->name('sale.create');

Route::get('/Sale/file-upload',[saleController::class,'upload'])->name('sale.upload');