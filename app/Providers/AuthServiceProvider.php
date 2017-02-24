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

        $user = \Auth::user();


        // Auth gates for: User management
        Gate::define('user_management_access',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_create',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_edit',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_view',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_delete',
            function ($user) {
            return in_array($user->role_id, [1]);
        });



        // Auth gates for: Groups
        Gate::define('group_access',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('group_create',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('group_edit',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('group_view',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('group_delete',
            function ($user) {
                return in_array($user->role_id, [1]);
            });

        // Auth gates for: Upload
        Gate::define('upload_access',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });

        // Auth gates for: News
        Gate::define('news_access',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('news_create',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('news_edit',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('news_view',
            function ($user) {
                return in_array($user->role_id, [1, 2]);
            });
        Gate::define('news_delete',
            function ($user) {
                return in_array($user->role_id, [1]);
            });



        // Auth gates for: Templates
        Gate::define('template_access',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('template_create',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('template_edit',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('template_view',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('template_delete',
            function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view',
            function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete',
            function ($user) {
            return in_array($user->role_id, [1]);
        });
    }
}