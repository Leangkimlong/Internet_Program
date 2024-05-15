<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/messages', [MessageController::class, 'messages'])
    ->name('messages');
Route::post('/message', [MessageController::class, 'message'])
    ->name('message');

    Route::get('/AuthUser', function () {
        $user = User::where('id', 1)->select([
            'id', 'name', 'email',
        ])->first();

        return response(request()->auth_userId);
    })->middleware('AuthUser');

    Route::get('/users', function () {
        $users = User::all();

        return response($users);
    });
