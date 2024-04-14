<?php

namespace App\Providers;

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
        //
    }
}
