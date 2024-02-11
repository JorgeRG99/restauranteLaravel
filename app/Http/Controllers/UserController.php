<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserSessionData() {
        $userData = User::find(Auth::id());
        $userData->load('cards');

        return response()->json($userData, 200);
    }

    public function getUserBookings() {
        $user = User::find(Auth::id());

        return response()->json($user->bookings()->get(), 200);
    }
}
