<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogModeration extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'admin_profile_id',
        'approved',
        'reason',
    ];

    public function blog(): BelongsTo {
        return $this->belongsTo(Blog::class);
    }

    public function adminProfile(): BelongsTo {
        return $this->belongsTo(AdminProfile::class);
    }
}
