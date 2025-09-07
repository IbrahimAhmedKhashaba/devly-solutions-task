<?php 

namespace App\Http\Controllers\Dashboard\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\DepartmentRequest;
use App\Interfaces\Services\Department\DepartmentServiceInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $departmentServices;


    public function __construct(DepartmentServiceInterface $departmentService)
    {
        $this->departmentServices = $departmentService;
    }
    public function index()
    {
        //
        $departments = $this->departmentServices->getAllDepartments();
        return view('dashboard.departments.index',compact('departments'));
    }
    public function store(DepartmentRequest $request)
    {
        //
        $department = $this->departmentServices->createDepartment($request->all());
        return $department ? redirect()->route(route: 'dashboard.departments.index')->with('success','Department Created Successfully') 
            : redirect()->route('dashboard.departments.index')->with('error','Department Not Created');
    }
    public function update(Request $request, string $id)
    {
        //
        $department = $this->departmentServices->updateDepartment($id , $request->all());
        return $department ? redirect()->route(route: 'dashboard.departments.index')->with('success','Department Updated Successfully') 
            : redirect()->route('dashboard.departments.index')->with('error','Department Not Updated');
    }
    public function destroy(string $id)
    {
        //
        $department = $this->departmentServices->deleteDepartment($id);
        return $department ? redirect()->route(route: 'dashboard.departments.index')->with('success','Department Deleted Successfully') 
            : redirect()->route('dashboard.departments.index')->with('error','Department Not Deleted');
    }
}