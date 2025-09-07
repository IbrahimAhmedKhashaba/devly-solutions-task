<?php 

namespace App\Interfaces\Services\Dashboard;

use App\Models\Dashboard;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface DashboardServiceInterface
{
    public function getDepartmentsCount();
    public function getEmployeesCount();
}