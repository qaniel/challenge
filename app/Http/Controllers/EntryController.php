<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Events\EntryCreated;
use App\Http\Requests\StoreEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EntryController extends Controller
{
    public function showEntryForm(): View
    {
        return view('entry.create');
    }

    public function createEntry(StoreEntry $request): RedirectResponse
    {
        $data = $request->validated();
        $entryModel = new Entry();
        $entryModel->title = $data['title'];
        $entryModel->content = $data['content'];
        $entryModel->user_id = Auth::user()->id;
        $entryModel->save();
        event(new EntryCreated($entryModel));

        return Redirect::back()->with('success', 'Entry Created!');
    }

    public function showEditEntryForm(Entry $entry): View
    {
        return view('entry.edit', [
            'id' => $entry->id,
            'title' => $entry->title,
            'content' => $entry->content,
        ]);
    }

    public function updateEntry(StoreEntry $request, Entry $entry): RedirectResponse
    {
        $data = $request->validated();
        $entry->title = $data['title'];
        $entry->content = $data['content'];
        $entry->update();

        return Redirect::back()->with('success', 'Entry Updated!');
    }

    public function showEntry(Entry $entry): View
    {
        return view('entry.view', ['entry' => $entry->toArray()]);
    }
}
