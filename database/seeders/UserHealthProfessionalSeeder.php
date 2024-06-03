<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserHealthProfessionalSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            // Create a user
            $userId = DB::table('users')->insertGetId([
                'name' => "User $i",
                'email' => "user$i@example.com",
                'password' => Hash::make('password'), // Make sure to hash the password
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Use the user ID to create a health professional profile
            DB::table('health_professional_profiles')->insert([
                'user_id' => $userId,
                'first_name' => "First $i",
                'last_name' => "Last $i",
                'about' => "Experienced healthcare professional $i.",
                'description' => "Description for health professional $i.",
                'date_of_birth' => now()->subYears(rand(30, 50))->format('Y-m-d'),
                'age' => rand(30, 50), // Random age between 30 and 50
                'specialization' => "Specialization $i",
                'hospital_affiliation' => "Hospital $i",
                'phone_number' => "123-456-789$i",
                'location' => "123 Main Street $i, Anytown, USA",
                'linkedin' => "https://www.linkedin.com/in/user$i",
                'youtube' => "https://www.youtube.com/user$i",
                'facebook' => "https://www.facebook.com/user$i",
                'instagram' => "https://www.instagram.com/user$i",
                'twitter' => "https://www.twitter.com/user$i",
                'price' => rand(100, 500), // Random price between 100 and 500
                'years_of_experience' => rand(1, 30), // Random years of experience between 1 and 30
                'issues' => json_encode(["issue$i-1", "issue$i-2"]), // Ensure issues are valid JSON
                'created_at' => now(),
                'updated_at' => now(),
                'gender' => $i % 2 == 0 ? 'Male' : 'Female', // Alternate gender
            ]);
        }
    }
}
