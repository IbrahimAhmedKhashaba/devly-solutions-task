<?php 

namespace App\Services\Dashboard;

use App\Interfaces\Repositories\Dashboard\DashboardRepositoryInterface;
use App\Interfaces\Services\Dashboard\DashboardServiceInterface;
use App\Models\Dashboard;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DashboardService implements DashboardServiceInterface
{
    private $dashboardRepository;

    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }
    
    public function getDepartmentsCount(){
        return $this->dashboardRepository->getDepartmentsCount();
    }
    public function getEmployeesCount(){
        return $this->dashboardRepository->getEmployeesCount();
    }
}