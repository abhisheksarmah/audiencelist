<?php

namespace App\Providers;

use DateTime;
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
        Gate::define('create-audience', function ($user, $requestDate, $startDate, $endDate) {
            $fromUser = new DateTime($requestDate);
            $startDate = new DateTime($startDate);
            $endDate = new DateTime($endDate);
            if ($this->isDateBetweenDates($fromUser, $startDate, $endDate)) {
                return true;
            }
            return false;
        });
        //
    }

    public function isDateBetweenDates(DateTime $date, DateTime $startDate, DateTime $endDate)
    {
        return $date >= $startDate && $date <= $endDate;
    }
}
