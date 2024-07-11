<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        Auth::user();
        $tags = [
            'Depression',
            'Anxiety Disorders',
            'Substance Abuse and Addiction',
            'Post-Traumatic Stress Disorder (PTSD)',
            'Eating Disorders',
            'Personality Disorders',
            'Relationship Issues',
            'Stress Management',
            'Grief and Loss',
            'Self-Esteem and Identity Issues'
        ];

        foreach ($tags as $tagName) {
            Tag::factory()->create([
                'name' => $tagName
            ]);
        }
    }
}
