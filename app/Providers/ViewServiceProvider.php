<?php

namespace App\Providers;

use App\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as CurrentView;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('dashboard', function (CurrentView $view) {
            $userId = Auth::user()->id;
            $userEntries = Entry::with('user')
                ->where('user_id', '=', $userId)
                ->get()
                ->toArray();
            $view->with('userEntries', $userEntries);
        });
    }
}
