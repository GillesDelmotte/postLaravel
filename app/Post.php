<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\PublishedScope;

class Post extends Model
{

    protected $fillable = [
        'title', 'content', 'owner_id', 'slug', 'published_at'
    ];

    protected $dates = ['created_at', 'published_at', 'updated_at', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PublishedScope());
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
