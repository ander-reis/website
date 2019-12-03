<?php

namespace Website\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Validator year
         */
        \Validator::extend('year_invalid', function($attribute, $value, $parameters, $validator){
            $data = explode('-', $value);
            $year = (int) $data[0];
            return ($year < 1900) ? $validator->errors()->keys('year_invalid') : true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
