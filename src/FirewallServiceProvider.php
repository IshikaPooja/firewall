<?php 

namespace Firwalle\Rule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class FirewallServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->make('Firwalle\Rule\FirwalleController');
        $this->loadViewsFrom(__DIR__.'/views', 'Rule');  
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function boot(): void
    {
        $this->app->singleton(Authenticatable::class, function ($app) {
            return $app['auth']->user();
        });

        $this->app['router']->aliasMiddleware('check.rule', \Firwalle\Rule\Middleware\CheckRule::class);
        
        include __DIR__.'/route.php';
    }
}
