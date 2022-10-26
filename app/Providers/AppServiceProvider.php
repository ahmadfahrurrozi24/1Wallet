<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('balance', function ($expression) {
            return "<?php echo Helper::balanceFormat($expression); ?>";
        });

        Blade::directive('amount', function ($expression) {
            return "<?php echo Helper::amountFormat($expression); ?>";
        });

        Paginator::useBootstrap();
    }
}
