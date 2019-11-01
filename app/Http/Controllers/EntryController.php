<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Http\Requests\CreateEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EntryController extends Controller
{
    public function showEntryForm(): View
    {
        return view('post.create');
    }

    public function createEntry(CreateEntry $request): RedirectResponse
    {
        $data = $request->validated();
        $entryModel = new Entry();
        $entryModel->title = $data['title'];
        $entryModel->content = $data['content'];
        $entryModel->user_id = Auth::user()->id;
        $entryModel->save();

        return Redirect::back()->with('success', 'Entry Created!');
    }
}
