<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Breweries\BreweryService;
use App\Services\Breweries\BreweryServiceInterface;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

use function config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Services
        $this->app->singleton(BreweryServiceInterface::class, BreweryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(static function (object $notifiable, string $token) {
            $email = $notifiable->getEmailForPasswordReset();

            return config('app.frontend_url') . '/password-reset/' . $token . '?email=' . $email;
        });
    }
}
