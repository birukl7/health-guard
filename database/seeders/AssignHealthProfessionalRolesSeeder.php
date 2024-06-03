<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignHealthProfessionalRolesSeeder extends Seeder
{
    public function run()
    {
        // Define the range of user IDs to be assigned the role
        $startUserId = 4;
        $endUserId = 13;

        // Iterate over each user ID in the specified range and assign the health professional role
        for ($userId = $startUserId; $userId <= $endUserId; $userId++) {
            DB::table('role_user')->insert([
                'role_id' => 2, // Assuming the 'health_professional' role has ID 2
                'user_id' => $userId,
                'user_type' => 'App\\Models\\User', // Adjust the namespace if necessary
            ]);
        }
    }
}
