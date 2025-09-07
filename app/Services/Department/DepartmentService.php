<?php 

namespace App\Services\Department;

use App\Interfaces\Repositories\Department\DepartmentRepositoryInterface;
use App\Interfaces\Services\Department\DepartmentServiceInterface;
use App\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DepartmentService implements DepartmentServiceInterface
{
    private $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }
    public function getAllDepartments(): ?LengthAwarePaginator{
        return $this->departmentRepository->getAllDepartments();
    }

    public function getDepartmentById(string $id): ?Department{
        return $this->departmentRepository->getDepartmentById($id);
    }

    public function createDepartment(array $data): ?Department{
        return $this->departmentRepository->createDepartment($data);
    }

    public function updateDepartment(string $id, array $data): ?Department{
        $department = $this->departmentRepository->getDepartmentById($id);
        return $department ? $this->departmentRepository->updateDepartment($data, $department) : null;
    }

    public function deleteDepartment(string $id): bool{
        $department = $this->departmentRepository->getDepartmentById($id);
        return $this->departmentRepository->deleteDepartment($department);
    }
}