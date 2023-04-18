<?php

namespace App\Providers;

use App\Category;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('administrator', function($user){
            return $user->role == 'administrator';
        });

        $gate->define('editor', function($user){
            return $user->role == 'editor' || $user->role == 'administrator';
        });

        $gate->define('author', function($user){
            return $user->role == 'author' || $user->role == 'editor' || $user->role == 'administrator';
        });

        $gate->define('contributor', function($user){
            return $user->role == 'contributor' || $user->role == 'author' || $user->role == 'editor' || $user->role == 'administrator';
        });

        $gate->define('myuser', function($user, $userid){
            return $user->id == $userid->id || $user->role == 'administrator';
        });

        $gate->define('mypost', function($user, $post){
            return $user->id == $post->user_id && $user->role == 'contributor' && $post->published == 0 || $user->id == $post->user_id && $user->role == 'author' || $user->role == 'administrator' || $user->role == 'editor';
        });
    }
}
