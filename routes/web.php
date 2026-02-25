<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/main');
});

Route::get('/main', function () {
    return view('main');
});


Route::get('/logout', function () {
    Filament::auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/admin/login');
})->name('logout');
