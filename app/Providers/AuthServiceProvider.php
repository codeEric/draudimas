<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Car;
use App\Models\User;
use App\Models\Owner;
use App\Policies\CarPolicy;
use App\Policies\OwnerPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Owner::class => OwnerPolicy::class,
        Car::class => CarPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('can-view-owner', [OwnerPolicy::class, 'view']);
        Gate::define('can-view-car', [CarPolicy::class, 'view']);
        Gate::define('can-list-owners', function (User $user, Owner $owner) {
            return $user->id === $owner->user_id || $user->role === 'admin';
        });

        //
    }
}
