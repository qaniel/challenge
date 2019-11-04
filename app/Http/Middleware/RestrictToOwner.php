<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
