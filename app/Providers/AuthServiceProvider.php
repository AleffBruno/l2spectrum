<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Account;

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

        Gate::define('actionAccount', function (User $user, $id) {
            return $user->id == $id;
        });

        Gate::define('actionsWithLoginParamAccount', function (User $user, $login) {
            $account = Account::find($login);
            if($account != null)
            {
                $userOwnerAccount = $account->getUser;
                return $user->id == $userOwnerAccount->id;
            }
            return false;
        });

        Gate::before(function ($user) {
            if ($user->isAdmin()) {
                return true;
            }
        });
    }
}
