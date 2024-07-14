<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthProfessionalProfile>
 */
class HealthProfessionalProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::factory(),
            'first_name' => function (array $attributes) {
                $nameParts = explode(' ', User::find($attributes['user_id'])->name, 2);
                return $nameParts[0];
            },
            'last_name' => function (array $attributes) {
                $nameParts = explode(' ', User::find($attributes['user_id'])->name, 2);
                return isset($nameParts[1]) ? $nameParts[1] : fake()->lastName();
            },
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
            'about'=> fake()->sentence(),
            'description'=> fake()->paragraph(),
            'date_of_birth'=> fake()->date(),
            'age' => fake()->numberBetween(20, 80),
            'specialization' => fake()->randomElement(['Clinical Psychology', 'Counseling Psychology', 'School Psychology', 'Forensic Psychology', 'Industrial-Organizational Psychology', 'Health Psychology', 'Neuropsychology', 'Developmental Psychology', 'Social Psychology','Experimental Psychology', 'Congnitive Psychology', 'Environmental Psychology',]),
            'phone_number' => fake()->phoneNumber(),
            'location' => fake()->address(),
            'linkedin' => fake()->url(),
            'youtube' => fake()->url(),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'twitter' => fake()->url(),
            'price' => fake()->numberBetween(5000, 20000),
            'years_of_experience' => fake()->numberBetween(2, 10)
        ];
    }
}
