<?php 

namespace App\Repositories\Employee;

use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAllEmployees(): ?LengthAwarePaginator{
        return Employee::with('department')
        ->when(request()->keyword , function($query){
            $query->where('name' , 'like' , '%'.request()->keyword.'%')
                ->orWhere('email' , 'like' , '%'.request()->keyword.'%')
                ->orWhere('salary' , '=' , request()->keyword);
        })->when(request()->department_id , function($query){
            $query->where('department_id' , request()->department_id);
        })->orderBy(request('sort_by' , 'id'), request('order_by' , 'desc'))
        ->paginate(request('limit' , 10));
    }

    public function getEmployeeById(string $id): ?Employee{
        return Employee::with('department')->find($id);
    }

    public function createEmployee(array $data): ?Employee{
        return Employee::create($data);
    }

    public function updateEmployee(array $data , Employee $employee): ?Employee{
        $employee->update($data);
        $employee->save();
        return $employee;
    }

    public function deleteEmployee(Employee $employee): bool{
        return $employee->delete();
    }

    public function getAllDepartments(): Collection{
        return Department::select(['id' , 'name'])->get();
    }

    public function getAllEmployeesForExportPDF($department): Collection{
        $query = Employee::with('department');
        if ($department) {
            $query->where('department_id', $department->id);
        }
        return $query->get();
    }
}