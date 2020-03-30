<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->email === 'admin@admin.com';
        });

        // Gate::define('store', function ($user) {
        //     return $user->email === 'admin@admin.com';
        // });

        // Gate::define('edit', function ($user) {
        //     return $user->email === 'admin@admin.com';
        // });

        // Gate::define('update', function ($user) {
        //     return $user->email === 'admin@admin.com';
        // });

        // Gate::define('delete', function ($user) {
        //     return $user->email === 'admin@admin.com';
        // });
    }
}
