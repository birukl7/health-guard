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
        HealthProfessionalProfile::factory(10)->create();
    }
}
