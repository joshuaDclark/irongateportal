<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-admin-dashboard', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('view-dealer-dashboard', function (User $user) {
            return $user->role === 'customer';
        });
    }
}
