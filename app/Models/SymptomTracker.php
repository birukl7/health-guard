<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SymptomTracker extends Model
{
    use HasFactory;
    protected $fillabe = [
        'student_id',
        'date',
        'symptom',
        'severity',
        'duration',
    ];

    public function studentProfile(): BelongsTo {
        return $this->belongsTo(StudentProfile::class);
    }
}
