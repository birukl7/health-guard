<?php

namespace App\Providers;

use App\Models\HealthProfessionalProfile;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('depression_questions', function ($app) {
            $jsonPath = base_path('data/depression_questions.json');
            return json_decode(file_get_contents($jsonPath), true);
        });

        $this->app->singleton('drug_questions', function ($app) {
            $jsonPath = base_path('data/drug_questions.json');
            return json_decode(file_get_contents($jsonPath), true);
        });

        $this->app->singleton('alcohol_questions', function ($app) {
            $jsonPath = base_path('data/alcohol_questions.json');
            return json_decode(file_get_contents($jsonPath), true);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
        Gate::define('edit-experience', function(User $user, HealthProfessionalProfile $hProff){
            return $hProff->user->is($user);
        });

        Gate::define('edit-post', function(User $user, Post $post){
            return $post->healthProfessionalProfile->user->is($user);
        });
    }
}
