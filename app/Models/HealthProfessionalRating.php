<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthProfessionalRating extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'health_professional_id',
        'rating',
        'comment'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function healthProfessionalProfile(): BelongsTo{
        return $this->belongsTo(HealthProfessionalProfile::class);
    }
}
