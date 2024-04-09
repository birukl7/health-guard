<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentProfile extends Model
{
    use HasFactory;
    protected $table = 'student_profiles';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'address',
        'allergies',
        'emergency_contact_name',
        'emergency_contact_number'
    ];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
