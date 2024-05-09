<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
      Gate::resource('posts', 'App\Policies\PostPolicy'); 
      Gate::define('posts.publish', 'App\Policies\PostPolicy@publish'); 
      Gate::define('posts.createuser', 'App\Policies\PostPolicy@createuser'); 
      Gate::define('posts.updateuser', 'App\Policies\PostPolicy@updateuser'); 
      Gate::define('posts.deleteuser', 'App\Policies\PostPolicy@deleteuser'); 
      Gate::define('posts.tag', 'App\Policies\PostPolicy@tag'); 
      Gate::define('posts.category', 'App\Policies\PostPolicy@category'); 
    }
}
