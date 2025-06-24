<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/sso-login', function (Request $request) {
    try {
        $data = Crypt::decrypt($request->token);

        // Optional: check expiration (max 1 min old)
        if (now()->diffInMinutes($data['timestamp']) > 1) {
            return response('Token expired', 401);
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response('User not found', 404);
        }

        Auth::login($user);
        return redirect('/dashboard');
    } catch (\Exception $e) {
        return response('Invalid token', 400);
    }
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
