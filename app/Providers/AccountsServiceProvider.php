<?php

namespace App\Providers;
use App\Accounts;
use Illuminate\Support\ServiceProvider;

class AccountsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
            
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with('storecustomeraccounts_array', Accounts::all());  //array with is used to store all table data.
        });
    }
}
