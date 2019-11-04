<?php

namespace App\Http\Controllers;

use App\User;

class IndexController extends Controller
{
    public function index()
    {
        $usersWithThreeEntries = User::with('threeEntries')
            ->get();
        $threeEntries = array_column($usersWithThreeEntries->toArray(), 'three_entries');
        $entriesCollection = collect(array_merge(...$threeEntries))
            ->sortByDesc('created_at');
        return view('welcome', ['entries' => $entriesCollection->toArray()]);
    }
}
