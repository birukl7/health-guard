<?php

namespace App\Policies;

use App\Models\HealthProfessionalProfile;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HealthProfessionalProfilePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function edit(User $user, HealthProfessionalProfile $hProff): bool{
        return $hProff->user->is($user);
    }

}
