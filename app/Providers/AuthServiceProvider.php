<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        Passport::routes(null, ['prefix'=> 'v1/oauth']);

        Passport::tokensCan([
            'admin' => 'Admin User Type',
            'employe' => 'Employe User Type',
            'stagiaire' => 'Stagiaire User Type',
        ]);
        //Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
        Passport::tokensExpireIn(now()->addHours(1));
        Passport::setDefaultScope([
            'admin',
        ]);
    }
}
