<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @param User $user
     */
    public function show(User $user)
    {
        $currentUser = Auth::user();
        return view('profile', [
            'user' => $user,
            'currentUser' => $currentUser
        ]);
    }
}
