<?php 

namespace App\Http\Controllers\Api\Dashboard;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DashboardRequest;
use App\Interfaces\Services\Department\DepartmentServiceInterface;
use App\Interfaces\Services\Dashboard\DashboardServiceInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $dashboardServices;


    public function __construct(DashboardServiceInterface $dashboardServices)
    {
        $this->dashboardServices = $dashboardServices;
    }
    public function __invoke()
    {
        //
        $departments_count = $this->dashboardServices->getDepartmentsCount();
        $employees_count = $this->dashboardServices->getEmployeesCount();
        return ApiResponse::success([
            'departments_count' => $departments_count,
            'employees_count' => $employees_count,
        ] , 'Data Fetched Successfully' , 200);
    }
}