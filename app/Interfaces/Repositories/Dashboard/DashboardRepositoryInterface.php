<?php 

namespace App\Interfaces\Repositories\Dashboard;


interface DashboardRepositoryInterface
{
    public function getDepartmentsCount();
    public function getEmployeesCount();
}