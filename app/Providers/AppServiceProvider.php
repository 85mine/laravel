<?php

namespace App\Providers;

use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\IpRepositoryInterface;
use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

use App\Repositories\Eloquent\EloquentCompanyRepository;
use App\Repositories\Eloquent\EloquentCustomerRepository;
use App\Repositories\Eloquent\EloquentIpRepository;
use App\Repositories\Eloquent\EloquentQuestionRepository;
use App\Repositories\Eloquent\EloquentUserRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Company
        $this->app->bind(
            CompanyRepositoryInterface::class,
            EloquentCompanyRepository::class
        );

        //Customer
        $this->app->bind(
            CustomerRepositoryInterface::class,
            EloquentCustomerRepository::class
        );

        //IP
        $this->app->bind(
            IpRepositoryInterface::class,
            EloquentIpRepository::class
        );

        //Question
        $this->app->bind(
            QuestionRepositoryInterface::class,
            EloquentQuestionRepository::class
        );

        //User
        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );

    }
}
