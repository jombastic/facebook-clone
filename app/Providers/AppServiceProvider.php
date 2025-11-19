<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Pipes\PrecognitivelyValidatePropertiesDataPipe;
use Spatie\LaravelData\DataPipes\ValidatePropertiesDataPipe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ValidatePropertiesDataPipe::class, PrecognitivelyValidatePropertiesDataPipe::class);
    }
}
