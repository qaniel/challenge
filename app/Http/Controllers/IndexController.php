<?php

namespace App\Http\Controllers;

use App\LastThreeEntriesPerUser;
use App\User;

class IndexController extends Controller
{
    public function index()
    {
        $entries = LastThreeEntriesPerUser::with(['entry', 'user'])
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('welcome', ['entries' => $entries]);
    }
}
