<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showUserEntries(User $user): View
    {
        $entries = Entry::with('user')->where('user_id', '=', $user->id)->paginate(3);

        return view('user.entries', ['entries' => $entries, 'user' => $user]);
    }
}
