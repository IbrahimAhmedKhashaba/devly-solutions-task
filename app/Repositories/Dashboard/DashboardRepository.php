<?php 

namespace App\Repositories\Dashboard;

use App\Interfaces\Repositories\Dashboard\DashboardRepositoryInterface;
use App\Models\Department;
use App\Models\Dashboard;
use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function getDepartmentsCount(){
        return Department::count();
    }
    public function getEmployeesCount(){
        return Employee::count();
    }
}