<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('paypal.client', function () {

            $clientId = config('services.paypal.client_id');
            $clientSecret = config('services.paypal.client_secret');
            $mode = config('services.paypal.mode');

            if($mode == 'sandbox'){
                $environment = new SandboxEnvironment($clientId, $clientSecret);
            }else{
                $environment = new ProductionEnvironment($clientId, $clientSecret);

            }
            $client = new PayPalHttpClient($environment);
            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
