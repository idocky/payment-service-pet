<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PaymentController::class, 'paymentSession'])->name('paymentSession');
Route::get('thanks-page', [\App\Http\Controllers\PaymentController::class, 'thanks'])->name('thanks');
