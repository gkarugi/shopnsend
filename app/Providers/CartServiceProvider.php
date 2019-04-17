<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('laracart.addItem', function ($a) {
            $cartProductTotal = \LaraCart::total($format = false, $withDiscount = true, $withTax = false, $withFees = false);

            $fee = $this->getFee($cartProductTotal);

            $this->setFee($fee);
        });

        Event::listen('laracart.removeItem', function ($a) {
            $cartProductTotal = \LaraCart::total($format = false, $withDiscount = true, $withTax = false, $withFees = false);

            $fee = $this->getFee($cartProductTotal);

            $this->setFee($fee);
        });
    }

    public function getFee(int $amount) : int
    {
        if ($amount == 0) {
            $fee = 0;
        } elseif ($amount > 0 && $amount <= 150) {
            $fee = 20;
        } elseif($amount > 150 && $amount < 460) {
            $fee = 25;
        } elseif($amount >= 500 && $amount <= 1000) {
            $fee = 30;
        } elseif($amount > 1000 && $amount <= 1500) {
            $fee = 35;
        } elseif($amount > 1500 && $amount <= 1800) {
            $fee = 40;
        } else {
            $fee = 50;
        }

        return $fee;
    }

    public function setFee(int $fee)
    {
        return \LaraCart::addFee('serviceFee', $fee, $taxable =  false, $options = []);
    }
}
