<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Strategies\ConektaChargeStrategy;
use App\Strategies\OpenPayChargeStrategy;
use App\Strategies\ChargeStrategyInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            ChargeStrategyInterface::class,
            OpenPayChargeStrategy::class
        );
    }
}
