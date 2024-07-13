<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function healthProfessionalProfile(){
        return $this->belongsTo(HealthProfessionalProfile::class);
    }

    public function postTags(){
        return $this->belongsToMany(PostTag::class);
    }

    public function postTag(string $name): void
    {
        $tag = PostTag::firstOrCreate([
            'name' => $name
        ]);

        $this->postTags()->attach($tag);
    }

    public function removePostTag(string $name): void
    {
        $tag = PostTag::firstOrCreate([
            'name' => $name
        ]);

        $this->postTags()->detach($tag);
    }
}
