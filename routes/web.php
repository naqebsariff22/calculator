<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});


use App\Http\Controllers\CalcController;

Route::get('/calc', [CalcController::class, 'index'])->name('calc.index');
Route::post('/calc', [CalcController::class, 'calculate'])->name('calc.calculate');
Route::post('/calc/edit/{index}', [CalcController::class, 'edit'])->name('calc.edit');
Route::post('/calc/update/{index}', [CalcController::class, 'update'])->name('calc.update');
Route::post('/calc/cancel', [CalcController::class, 'cancelEdit'])->name('calc.cancel');
Route::post('/calc/delete/{index}', [CalcController::class, 'delete'])->name('calc.delete');
