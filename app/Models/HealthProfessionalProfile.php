<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HealthProfessionalProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function healthRatings(): HasMany {
        return $this->hasMany(HealthRating::class);
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
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
    
    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate([
            'name' => $name
        ]);

        $this->tags()->attach($tag);
    }

    public function removeTag(string $name): void
    {
        $tag = Tag::firstOrCreate([
            'name' => $name
        ]);

        $this->tags()->detach($tag);
    }

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }
    

}
