<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
       Model::unguard(true);

       $admins = [
            '1'
       ];
       Gate::define('is_admin',fn()=>in_array(auth()->user()?->id,$admins));
       Gate::define('is_employee',fn()=>in_array(auth()->user()?->super_id,$admins));
    }
}
