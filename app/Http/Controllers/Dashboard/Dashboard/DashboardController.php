<?php 

namespace App\Http\Controllers\Dashboard\Dashboard;

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
        return view('dashboard.index',compact(['departments_count' , 'employees_count']));
    }
}