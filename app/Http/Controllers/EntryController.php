<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EntryController extends Controller
{
    public function showEntryForm(): View
    {
        return view('post.create');
    }
}
