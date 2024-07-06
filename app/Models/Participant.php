<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participant extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($participant) {
            $participant->assesments()->delete();
        });
    }

    public function assesments(): HasMany
    {
        return $this->hasMany(Assesment::class, 'participants_id');
    }
}

