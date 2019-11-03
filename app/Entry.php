<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Entry extends Model
{
    use HasEagerLimit;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
