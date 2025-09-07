<?php

namespace App\Providers;

use App\Interfaces\Repositories\Department\DepartmentRepositoryInterface;
use App\Interfaces\Services\Department\DepartmentServiceInterface;
use App\Repositories\Department\DepartmentRepository;
use App\Services\Department\DepartmentService;
use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Services\Employee\EmployeeService;
use App\Interfaces\Repositories\Dashboard\DashboardRepositoryInterface;
use App\Interfaces\Repositories\Profile\ProfileRepositoryInterface;
use App\Interfaces\Services\Dashboard\DashboardServiceInterface;
use App\Interfaces\Services\Profile\ProfileServiceInterface;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Profile\ProfileRepository;
use App\Services\Profile\ProfileService;
use App\Services\Dashboard\DashboardService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

        $this->app->bind(DepartmentServiceInterface::class,DepartmentService::class);
        $this->app->bind(DepartmentRepositoryInterface::class,DepartmentRepository::class);
        
        $this->app->bind(EmployeeServiceInterface::class,EmployeeService::class);
        $this->app->bind(EmployeeRepositoryInterface::class,EmployeeRepository::class);
        
        $this->app->bind(DashboardServiceInterface::class,DashboardService::class);
        $this->app->bind(DashboardRepositoryInterface::class,DashboardRepository::class);
        
        $this->app->bind(ProfileServiceInterface::class,ProfileService::class);
        $this->app->bind(ProfileRepositoryInterface::class,ProfileRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
