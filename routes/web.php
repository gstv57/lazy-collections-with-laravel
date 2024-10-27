<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $users = User::select(['id', 'name', 'email'])
        ->where('email', 'like', '%@%')
        ->orderBy('id')
        ->lazy()
        ->each(function ($user) {
            Log::info("name: $user->name, email: $user->email");
        });

    return "DONE!";
});
