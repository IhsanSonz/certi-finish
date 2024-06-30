<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    /**
     * Get the comments for the blog post.
     */
    public function assesments(): HasMany
    {
        return $this->hasMany(Assesment::class);
    }
}
