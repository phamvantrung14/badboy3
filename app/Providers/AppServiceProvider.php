<?php

namespace App\Providers;
use App\Models\Type_products;
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
        view()->composer('*',function ($view){
            $type_pd = Type_products::all();
            $view->with([
               "type_pd"=>$type_pd,
            ]);
        });
    }
}
