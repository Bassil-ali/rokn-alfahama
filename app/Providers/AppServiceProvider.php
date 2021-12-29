<?php

namespace App\Providers;

use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use App\Observers\OrderItemObserver;
use App\Observers\PaymentObserver;
use App\Observers\SettingObserver;
use App\Observers\UserObserver;
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
        //
        User::observe(UserObserver::class);
        OrderItem::observe(OrderItemObserver::class);
        Payment::observe(PaymentObserver::class);
        Setting::observe(SettingObserver::class);
    }
}
