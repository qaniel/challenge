<?php

namespace App\Http\Middleware;

use App\Entry;
use App\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictToOwner
{
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->user()->id ?? null;
        $entry = $request->route('entry', null);
        if ($userId ==  $entry->user_id) {
            return $next($request);
        }

        return redirect()
            ->route('home')
            ->with(
                'warning',
                'Oh oh your trying to modify/access other user content! that is illegal D:'
            );
    }
}
