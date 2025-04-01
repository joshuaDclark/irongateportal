<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Gate::allows('view-admin-dashboard')) {
            return redirect()->route('admin.dashboard');
        }
    
        if (Gate::allows('view-dealer-dashboard')) {
            return redirect()->route('dealer.dashboard');
        }
    
        abort(403); // fallback if no role matches
    })->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->name('dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'can:view-admin-dashboard'
    ])->name('admin.dashboard');

    Route::get('/dealer/dashboard', function () {
        return view('dealer.dashboard');
    })->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'can:view-dealer-dashboard'
    ])->name('dealer.dashboard');
});
