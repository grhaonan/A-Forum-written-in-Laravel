<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function show (User $user)

    {
        $profileUser = $user;
        $threads = $user->threads()->latest()->paginate(5);
        return view('profiles.show', compact('profileUser', 'threads'));

    }

}
