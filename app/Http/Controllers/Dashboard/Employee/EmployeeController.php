<?php 

namespace App\Http\Controllers\Dashboard\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
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
        $departments = $this->employeeServices->getAllDepartments();
        return view('dashboard.employees.index',compact(['employees' , 'departments']));
    }
    public function store(EmployeeRequest $request)
    {
        //
        $employee = $this->employeeServices->createEmployee($request->all());
        return $employee ? redirect()->route(route: 'dashboard.employees.index')->with('success','Employee Created Successfully') 
            : redirect()->route('dashboard.employees.index')->with('error','Employee Not Created');
    }
    public function update(Request $request, string $id)
    {
        //
        $employee = $this->employeeServices->updateEmployee($id , $request->all());
        return $employee ? redirect()->route(route: 'dashboard.employees.index')->with('success','Employee Updated Successfully') 
            : redirect()->route('dashboard.employees.index')->with('error','Employee Not Updated');
    }
    public function destroy(string $id)
    {
        //
        $employee = $this->employeeServices->deleteEmployee($id);
        return $employee ? redirect()->route(route: 'dashboard.employees.index')->with('success','Employee Deleted Successfully') 
            : redirect()->route('dashboard.employees.index')->with('error','Employee Not Deleted');
    }

    public function export(Request $request)
    {
        return $this->employeeServices->export($request->get('department') , $request->get('export'));
    }
}