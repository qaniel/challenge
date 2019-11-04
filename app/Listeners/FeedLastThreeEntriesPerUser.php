<?php

namespace App\Listeners;

use App\Events\EntryCreated;
use App\LastThreeEntriesPerUser;

class FeedLastThreeEntriesPerUser
{

    public function handle(EntryCreated $event): void
    {
        $userEntryFeed = new LastThreeEntriesPerUser();
        $userEntryFeed->user_id = $event->entry->user_id;
        $userEntryFeed->entry_id = $event->entry->id;
        $userEntryFeed->save();
    }
}
