<?php 

namespace App\Interfaces\Services\Employee;

use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeServiceInterface
{
    public function getAllEmployees(): ?LengthAwarePaginator;
    public function getEmployeeById(string $id): ?Employee;
    public function createEmployee(array $data): ?Employee;
    public function updateEmployee(string $id, array $data): ?Employee;
    public function deleteEmployee(string $id): bool;
    public function getAllDepartments(): Collection;
    public function export($id , $type);
    public function exportExcel($department);
    public function exportPdf($department);
}