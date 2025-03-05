<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contact Management Routes (CRUD)
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactsController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{contact}/edit', [ContactsController::class, 'edit'])->name('contacts.edit');
    Route::patch('/contacts/{contact}', [ContactsController::class, 'update'])->name('contacts.update'); // Ensure PATCH is used
    Route::delete('/contacts/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');
});

require __DIR__.'/auth.php';
