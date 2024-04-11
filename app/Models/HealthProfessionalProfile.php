<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HealthProfessionalProfile extends Model
{
    use HasFactory;
    
    protected $fillable=[

        'user_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'about',
        'description',
        'age',
        'specialization',
        'hospital_affiliation',
        'phone_number',
        'location',
        'license',
        'linkedin',
        'youtube',
        'facebook',
        'instagram',
        'twitter',
        'specialities',
        'price',
        'years_of_experience',
        'issues',
    ];

    protected $cast = [
        'issues' => 'array'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function healthRatings(): HasMany {
        return $this->hasMany(HealthRating::class);
    }
}
