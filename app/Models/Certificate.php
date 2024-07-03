<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'layout',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function assesments(): HasMany
    {
        return $this->hasMany(Assesment::class);
    }
}
