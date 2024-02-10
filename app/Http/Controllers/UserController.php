<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserSessionData() {
        $userData = User::find(Auth::id());
        $userData->load('cards');
        $userData->load('bookings');

        return response()->json($userData, 200);
    }
}
