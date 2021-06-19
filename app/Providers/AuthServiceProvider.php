<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
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

        Gate::define('patient', function($user){         
            $permissions = DB::table('permissions')->where('role_id',1)->where('user_id',$user->id)->where('status',1)->get();
            return ( sizeof($permissions) != 0);
        });
        
        $this->registerPolicies();
        Gate::define('admin', function($user){         
            $permissions = DB::table('permissions')->where('role_id',2)->where('user_id',$user->id)->where('status',1)->get();
            return ( sizeof($permissions) != 0);
        });

        Gate::define('nurse', function($user){         
            $permissions = DB::table('permissions')->where('role_id',3)->where('user_id',$user->id)->where('status',1)->get();
           // dd($permissions);
            return ( sizeof($permissions) != 0);
        });
    }
}
