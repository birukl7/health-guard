<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tag',
        'read_minutes',
        'title',
        'content',
    ];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function blogComments(): HasMany {
        return $this->hasMany(BlogComment::class);
    }

    public function blogLikes(): HasMany {
        return $this->hasMany(BlogLike::class);
    }

    public function bolgModeration(): HasOne {
        return $this->hasOne(BlogModeration::class);
    }
}
