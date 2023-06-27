<?php

namespace App\Providers;

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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //Mengatur Hak Akses untuk user
        Gate::define('pemilik-only', function ($users) {
            if ($users->level == 'pemilik'){
                return true; 
            } 
            return false; 
        });
    
        //Mengatur Hak Akses untuk events
        Gate::define('customer-only', function ($events) {
            if ($events->level == 'customer'){
                return true; 
            } 
            return false; 
        });
    
         //Mengatur Hak Akses untuk eventorganizer
         Gate::define('eo-only', function ($eventorganizer) {
            if ($eventorganizer->level == 'eo'){
                return true; 
            } 
            return false; 
        });
    
         //Mengatur Hak Akses untuk attendees
         Gate::define('customer-only', function ($attendees) {
            if ($attendees->level == 'customer'){
                return true; 
            } 
            return false; 
        });
    }
}
