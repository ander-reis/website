<?php

namespace Website\Providers;

use Code\Validator\Cpf;
use Code\Validator\Cnpj;
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

        \Validator::extend('cpf', function ($attibute, $value, $parameters, $validator) {
            return (new Cpf())->isValid($value); //Para validar CPF.
        });

        \Validator::extend('cnpj', function ($attibute, $value, $parameters, $validator) {
            return (new Cnpj())->isValid($value); //Para validar CNPJ.
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
