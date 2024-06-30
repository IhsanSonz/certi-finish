<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the comment.
     */
    public function certificates(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function participants(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }
}
