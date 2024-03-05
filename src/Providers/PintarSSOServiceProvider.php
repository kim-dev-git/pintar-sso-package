<?php

namespace Banjarmasinkota\PintarSSO\Providers;

use Illuminate\Support\ServiceProvider;
use Banjarmasinkota\PintarSSO\PintarSSO;

/**
 * Class PasswordServiceProvider
 */
class PintarSSOServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('PintarSSO', PintarSSO::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/pintar_sso.php' => config_path('pintar_sso.php'),
            __DIR__.'/../Migrations/2024_02_28_035830_create_pintar_accounts_table.php' => base_path('/database/migrations/2024_02_28_035830_create_pintar_accounts_table.php'),
            __DIR__.'/../Models/PintarAccount.php' => base_path('/app/Models/PintarAccount.php'),
            __DIR__.'/../Traits/HasPintarAccount.php' => base_path('/app/Traits/HasPintarAccount.php')
            // __DIR__.'/../middlewares/PintarSSOMiddleware.php' => base_path('/app/Http/Middleware/PintarSSOMiddleware.php'),
        ]);
    }
}
