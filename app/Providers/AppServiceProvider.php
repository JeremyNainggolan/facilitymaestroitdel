<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        Validator::extend('alpha_spaces', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z\s]*$/', $value); // Hanya huruf dan spasi
        });

        Validator::replacer('alpha_spaces', function ($message, $attribute, $rule, $parameters) {
            return 'The ' . $attribute . ' can only contain letters and spaces.';
        });
    }
}
