<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasFactory, Notifiable;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        //'role_id',
        'password',
    ];


    public function adminProfiles(): HasMany {
        return $this->hasMany(AdminProfile::class);
    }

    public function alcoholUseTrackers(): HasMany {
        return $this->hasMany(AlcoholUseTracker::class);
    }

    public function blogs(): HasMany{
        return $this->hasMany(Blog::class);
    }

    public function blogComments(): HasMany{
        return $this->hasMany(BlogComment::class);
    }

    public function blogLikes(): HasMany{
        return $this->hasMany(BlogLike::class);
    }

    public function chatMessages(): HasMany{
        return $this->hasMany(ChatMessage::class);
    }

    public function depressionTrackers(): HasMany{
        return $this->hasMany(DepressionTracker::class);
    }

    public function drugUseTrackers(): HasMany{
        return $this->hasMany(DrugUseTracker::class);
    }

    public function healthProfessionalProfiles(): HasMany{
        return $this->hasMany(HealthProfessionalProfile::class);
    }

    public function studentProfiles(): HasMany{
        return $this->hasMany(StudentProfile::class);
    }

    public function healthProfessionalRatings(): HasMany{
        return $this->hasMany(HealthRating::class);
    }

    public function meditataions(): HasMany{
        return $this->hasMany(Meditation::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
