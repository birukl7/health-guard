<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HealthProfessionalProfile extends Model
{
    use HasFactory;
    
    // protected $fillable=[

    //     'user_id',
    //     'first_name',
    //     'last_name',
    //     'date_of_birth',
    //     'about',
    //     'description',
    //     'age',
    //     'specialization',
    //     'hospital_affiliation',
    //     'phone_number',
    //     'location',
    //     'license',
    //     'linkedin',
    //     'youtube',
    //     'facebook',
    //     'instagram',
    //     'twitter',
    //     'price',
    //     'years_of_experience',
    //     'issues',
    // ];

    public $guarded = [];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function healthRatings(): HasMany {
        return $this->hasMany(HealthRating::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    // public static function search($keyword)
    // {
    //     return self::where(function($query) use ($keyword) {
    //                     $query->where('first_name', 'like', "%$keyword%")
    //                         ->orWhere('last_name', 'like', "%$keyword%")
    //                         ->orWhere('about', 'like', "%$keyword%")
    //                         ->orWhere('description', 'like', "%$keyword%")
    //                         ->orWhere('specialization', 'like', "%$keyword%")
    //                         ->orWhere('hospital_affiliation', 'like', "%$keyword%")
    //                         ->orWhere('phone_number', 'like', "%$keyword%")
    //                         ->orWhere('location', 'like', "%$keyword%")
    //                         ->orWhere('license', 'like', "%$keyword%")
    //                         ->orWhere('linkedin', 'like', "%$keyword%")
    //                         ->orWhere('youtube', 'like', "%$keyword%")
    //                         ->orWhere('facebook', 'like', "%$keyword%")
    //                         ->orWhere('instagram', 'like', "%$keyword%")
    //                         ->orWhere('twitter', 'like', "%$keyword%")
    //                         ->orWhere('price', 'like', "%$keyword%")
    //                         ->orWhere('years_of_experience', 'like', "%$keyword%");
    //                     if (is_array($keyword)) {
    //                         $query->orWhereJsonContains('issues', $keyword);
    //                     }
    //                 })
    //                 ->get();
    // }
    
    

}
