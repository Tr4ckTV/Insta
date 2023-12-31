<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    protected $casts = ['published_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function likeCount(): int
    {
        return $this->likes()->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
