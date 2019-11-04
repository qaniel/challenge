<?php

namespace App\Events;

use App\Entry;
use Illuminate\Queue\SerializesModels;

class EntryCreated
{
    use SerializesModels;

    /** @var Entry */
    public $entry;

    /**
     * EntryCreated constructor.
     *
     * @param Entry $entry
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }
}
