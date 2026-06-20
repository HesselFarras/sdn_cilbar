<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Ini penting di-import buat ngatur skema URL

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
        // Memaksa skema URL ke HTTPS jika berjalan di Vercel / Production environment
        if (config('app.env') === 'production' || isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            URL::forceScheme('https');
        }
    }
}