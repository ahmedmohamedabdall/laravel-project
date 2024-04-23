<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\idea;
use App\Models\User;
use App\Policies\IdeaPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        idea::class=>IdeaPolicy::class
        ,User::class=>UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user): bool {
            return (bool) $user->is_admin;
        });


    }
}
