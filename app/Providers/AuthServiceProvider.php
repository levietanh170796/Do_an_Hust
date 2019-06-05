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

        $gate_admins = [
            'levels', 'subjects', 'contest-rounds', 'questions', 'roles', 'contest_results'
        ];

        foreach($gate_admins as $gate_admin) {
            Gate::define($gate_admin, function ($user) {
               return $user->isAdmin() ? true : false;
           });
       }

        $gate_users = [
            'user_profiles', 'home_user', 'my_results', 'leader_boards'
        ];
        
        foreach($gate_users as $gate_user) {
             Gate::define($gate_user, function ($user) {
                return $user->isAdmin() ? false : true;
            });
        }
    }
}
