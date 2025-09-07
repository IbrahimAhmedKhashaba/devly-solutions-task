<?php 

namespace App\Services\Employee;

use App\Interfaces\Repositories\Department\DepartmentRepositoryInterface;
use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeService implements EmployeeServiceInterface
{
    private $employeeRepository , $departmentRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository , DepartmentRepositoryInterface $departmentRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->departmentRepository = $departmentRepository;
    }
    public function getAllEmployees(): ?LengthAwarePaginator{
        return $this->employeeRepository->getAllEmployees();
    }

    public function getEmployeeById(string $id): ?Employee{
        return $this->employeeRepository->getEmployeeById($id);
    }

    public function createEmployee(array $data): ?Employee{
        return $this->employeeRepository->createEmployee($data);
    }

    public function updateEmployee(string $id, array $data): ?Employee{
        $employee = $this->employeeRepository->getEmployeeById($id);
        return $employee ? $this->employeeRepository->updateEmployee($data, $employee) : null;
    }

    public function deleteEmployee(string $id): bool{
        $employee = $this->employeeRepository->getEmployeeById($id);
        return $this->employeeRepository->deleteEmployee($employee);
    }

    public function getAllDepartments(): Collection{
        return $this->employeeRepository->getAllDepartments();
    }

    public function export($id , $type)
    {
        $department = $id ? $this->departmentRepository->getDepartmentById($id) : 0;
        if($type == 'pdf'){
            return $this->exportPdf($department);
        } else{
            return $this->exportExcel($department);
        }
    }

    public function exportExcel($department)
    {
        return Excel::download(new EmployeesExport($department), 'employees.xlsx');
    }

    public function exportPdf($department){
        $employees = $this->employeeRepository->getAllEmployeesForExportPDF($department);
        $pdf = Pdf::loadView('dashboard.employees.print', compact('employees'));
        return $pdf->download('employees.pdf');
    }
}