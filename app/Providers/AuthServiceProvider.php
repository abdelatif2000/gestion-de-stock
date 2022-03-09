<?php
namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Session;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //  'App\Client' => 'App\Policies\ClientPolicy',
        //  'App\Provider' => 'App\Policies\ProviderPolicy',
    ];
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAble', function (User $user,$action){
            return in_array($action, Session::get("accesses"));
        });
    }
}
