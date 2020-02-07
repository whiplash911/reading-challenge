<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    public function profile(User $user)
    {
        return view('profile.index', compact('user'));
    }
}
