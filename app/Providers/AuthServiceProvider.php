<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::resource('posts', 'App\Policies\PostPolicy');
        Gate::resource('users', 'App\Policies\UserPolicy');
        Gate::define('create-post', function($user){
            foreach($user->permissions as $permission)
            {
                    if($permission->id == 1)
                    {
                        return true;
                    }else{
                        return false;
                    }
                }
        });
    }
}
