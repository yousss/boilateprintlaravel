<?php

namespace App\Providers;

use App\Billing\BankPaymentGatewayContract;
use App\Billing\CreditCardPaymentGateway;
use App\Billing\PaymentGateway;
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
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->singleton(BankPaymentGatewayContract::class, function ($app) {
            if (request()->has("credi"))
                return new CreditCardPaymentGateway("EURO");

            return new PaymentGateway("USD");
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
