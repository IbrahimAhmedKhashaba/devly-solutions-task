<?php 

namespace App\Interfaces\Repositories\Employee;

use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeRepositoryInterface
{
    public function getAllEmployees(): ?LengthAwarePaginator;

    public function getEmployeeById(string $id): ?Employee;

    public function createEmployee(array $data): ?Employee;

    public function updateEmployee(array $data , Employee $Employee): ?Employee;

    public function deleteEmployee(Employee $Employee): bool;
    public function getAllDepartments(): Collection;
    public function getAllEmployeesForExportPDF($id);
}