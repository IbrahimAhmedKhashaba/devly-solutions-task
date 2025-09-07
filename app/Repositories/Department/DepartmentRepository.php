<?php 

namespace App\Repositories\Department;

use App\Interfaces\Repositories\Department\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function getAllDepartments(): ?LengthAwarePaginator{
        return Department::withCount('employees')
        ->when(request()->keyword , function($query){
            $query->where('name' , 'like' , '%'.request()->keyword.'%');
        })->orderBy(request('sort_by' , 'id'), request('order_by' , 'asc'))
        ->paginate(request('limit' , 10));
    }

    public function getDepartmentById(string $id): ?Department{
        return Department::find($id);
    }

    public function createDepartment(array $data): ?Department{
        return Department::create($data);
    }

    public function updateDepartment(array $data , Department $department): ?Department{
        $department->update($data);
        $department->save();
        return $department;
    }

    public function deleteDepartment(Department $department): bool{
        return $department->delete();
    }
}