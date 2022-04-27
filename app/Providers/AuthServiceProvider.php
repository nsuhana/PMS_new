<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('projek-collaborator', function (Models\User $user, Models\project $project) {

            if(Models\user_project::where('user_id', $user->id)->where('project_id', $project->id)->count() > 0 || $user->isAdministrator()) {
                return true;
            }
            return false;
        });

        Gate::define('projek-owner', function (Models\User $user, Models\project $project) {

            if(Models\user_project::where('user_id', $user->id)->where('project_id', $project->id)->where('user_role_project', 'owner')->count() > 0 || $user->isAdministrator()) {
                return true;
            }
            return false;
        });

    }
}
