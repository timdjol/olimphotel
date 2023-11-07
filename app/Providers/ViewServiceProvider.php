<?php

namespace App\Providers;

use App\Services\CurrencyConversion;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['layouts.master', 'rooms'], 'App\ViewComposers\RoomsComposer');
        View::composer(['layouts.master', 'contacts'], 'App\ViewComposers\ContactsComposer');
        View::composer(['layouts.booking', 'rooms'], 'App\ViewComposers\RoomsComposer');
        View::composer(['layouts.booking', 'contacts'], 'App\ViewComposers\ContactsComposer');

    }
}
