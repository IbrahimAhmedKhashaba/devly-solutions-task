<?php 

namespace App\Http\Controllers\Api\Employee;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Interfaces\Services\Department\DepartmentServiceInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeServices, $departmentService;


    public function __construct(EmployeeServiceInterface $employeeService)
    {
        $this->employeeServices = $employeeService;
    }
    public function index()
    {
        //
        $employees = $this->employeeServices->getAllEmployees();
        return ApiResponse::success([
                'Employees' => EmployeeResource::collection($employees),
                'meta' => [
                    'current_page' => $employees->currentPage(),
                    'last_page' => $employees->lastPage(),
                    'per_page' => $employees->perPage(),
                    'total' => $employees->total(),
                ],
                'links' => [
                    'next' => $employees->nextPageUrl(),
                    'prev' => $employees->previousPageUrl(),
                ]
            ], 'Employees fetched successfully', 200);
    }
    public function show($id)
    {
        //
        $employee = $this->employeeServices->getEmployeeById($id);
        return $employee ? ApiResponse::success([
            'employee' => new EmployeeResource($employee),
        ], 'Employee fetched successfully', 200)
        : ApiResponse::error('Employee not found', 404);
    }
    public function store(EmployeeRequest $request)
    {
        //
        $employee = $this->employeeServices->createEmployee($request->all());
        return $employee ? ApiResponse::success([
            'employee' => new EmployeeResource($employee),
        ], 'Employee created successfully', 200)
        : ApiResponse::error('Error creating employee', 400);
    }
    public function update(Request $request, string $id)
    {
        //
        $employee = $this->employeeServices->updateEmployee($id , $request->all());
        return $employee ? ApiResponse::success([
            'employee' => new EmployeeResource($employee),
        ], 'Employee updated successfully', 200)
        : ApiResponse::error('Error updating employee', 400);
    }
    public function destroy(string $id)
    {
        //
        $employee = $this->employeeServices->deleteEmployee($id);
        return $employee ? ApiResponse::success([] , 'Employee deleted successfully', 200)
                : ApiResponse::error('Error deleting employee', 400);
    }

    public function export(Request $request)
    {
        return $this->employeeServices->export($request->get('department') , $request->get('export'));
    }
}