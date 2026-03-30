<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/download/android', function () {
    return redirect()->away('https://play.google.com/store/apps/details?id=com.gohealth.app');
})->name('download.android');

Route::get('/download/ios', function () {
    return redirect()->away('https://apps.apple.com/app/gohealth/id123456789');
})->name('download.ios');