<?php 

namespace App\Interfaces\Repositories\Department;

use App\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface DepartmentRepositoryInterface
{
    public function getAllDepartments(): ?LengthAwarePaginator;

    public function getDepartmentById(string $id): ?Department;

    public function createDepartment(array $data): ?Department;

    public function updateDepartment(array $data , Department $department): ?Department;

    public function deleteDepartment(Department $department): bool;
}