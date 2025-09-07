<?php 

namespace App\Interfaces\Services\Department;

use App\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface DepartmentServiceInterface
{
    public function getAllDepartments(): ?LengthAwarePaginator;

    public function getDepartmentById(string $id): ?Department;

    public function createDepartment(array $data): ?Department;

    public function updateDepartment(string $id, array $data): ?Department;

    public function deleteDepartment(string $id): bool;
}