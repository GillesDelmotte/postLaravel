<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title', 'content', 'owner_id', 'slug'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
