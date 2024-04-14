<?php

namespace Database\Seeders;

use App\Models\HealthProfessionalProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HealthProfessionalProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {

            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt($i), // Passwords range from '1' to '10'
            ]);

            $user->assignRole('health_professional');
            $user->healthProfessionalProfile()->create::create([
            'user_id' => $user->id,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'date_of_birth' => $faker->date(),
            'about' => $faker->paragraph,
            'description' => $faker->paragraph,
            'age' => $faker->numberBetween(25, 65),
            'specialization' => $faker->jobTitle,
            'hospital_affiliation' => $faker->company,
            'phone_number' => $faker->phoneNumber,
            'location' => $faker->address,
            'license' => $faker->uuid,
            'linkedin' => $faker->url,
            'youtube' => $faker->url,
            'facebook' => $faker->url,
            'instagram' => $faker->url,
            'twitter' => $faker->url,
            'price' => $faker->randomFloat(2, 50, 500),
            'years_of_experience' => $faker->numberBetween(1, 30),
            'issues' => $faker->randomElements(['Anxiety', 'Depression', 'Stress', 'Relationship Issues'], $count = 2),
        ]);
        }
    }
}
