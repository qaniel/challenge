<?php

namespace App\Listeners;

use App\Events\EntryCreated;
use App\LastThreeEntriesPerUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnsureOnlyThreeEntriesOnFeed
{
    public function handle(EntryCreated $event): void
    {
        $entriesFeed = LastThreeEntriesPerUser::with('user')
            ->where('user_id', '=', $event->entry->user_id)
            ->get();

        if ($entriesFeed->count() > 3) {
            $idToDelete = $entriesFeed->min('id');
            LastThreeEntriesPerUser::destroy($idToDelete);
        }
    }
}
