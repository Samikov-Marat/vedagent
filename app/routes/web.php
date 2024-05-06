<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CalculatorController::class, 'index'])
    ->name('calculator.index');
Route::get('/calculate', [CalculatorController::class, 'calculate'])
    ->name('calculator.calculate');
Route::post('/save', [CalculatorController::class, 'save'])
    ->name('calculator.save');
Route::get('/thanks/{id}', [CalculatorController::class, 'thanks'])
    ->name('calculator.thanks');
