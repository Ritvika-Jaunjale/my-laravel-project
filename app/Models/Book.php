<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'is_bookmarked',
        'status',
    ];

    protected $casts = [
        'is_bookmarked' => 'boolean',
    ];
}
