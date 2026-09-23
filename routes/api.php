<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });
});
