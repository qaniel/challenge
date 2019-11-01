<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EntryController extends Controller
{
    public function createPost(): View
    {
        return view('post.create');
    }
}
