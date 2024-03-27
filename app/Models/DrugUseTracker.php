<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrugUseTracker extends Model
{
    use HasFactory;
    protected $fillabe = [
        'user_id',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'question_9',
        'question_10',
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
