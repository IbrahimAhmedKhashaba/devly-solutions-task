<?php 

namespace App\Http\Controllers\Api\Department;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\DepartmentRequest;
use App\Http\Resources\Department\DepartmentResource;
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
        return ApiResponse::success([
                'Departments' => DepartmentResource::collection($departments),
                'meta' => [
                    'current_page' => $departments->currentPage(),
                    'last_page' => $departments->lastPage(),
                    'per_page' => $departments->perPage(),
                    'total' => $departments->total(),
                ],
                'links' => [
                    'next' => $departments->nextPageUrl(),
                    'prev' => $departments->previousPageUrl(),
                ]
            ], 'Departments fetched successfully', 200);
    }

    public function show($id){
        $department = $this->departmentServices->getDepartmentById($id);
        return $department ? ApiResponse::success([
            'Department' => new DepartmentResource($department),
        ], 'Department fetched successfully', 200) : ApiResponse::error('Department not found', 404);
    }
    public function store(DepartmentRequest $request)
    {
        //
        $department = $this->departmentServices->createDepartment($request->all());
        return $department ? ApiResponse::success([
            'Department' => new DepartmentResource($department),
        ], 'Department created successfully', 201) : ApiResponse::error('Department not created', 400);
    }
    public function update(Request $request, string $id)
    {
        //
        $department = $this->departmentServices->updateDepartment($id , $request->all());
        return $department ? ApiResponse::success([
            'Department' => new DepartmentResource($department),
        ], 'Department updated successfully', 200) : ApiResponse::error('Department not updated', 400);
    }
    public function destroy(string $id)
    {
        //
        $department = $this->departmentServices->deleteDepartment($id);
        return $department ? ApiResponse::success([], 'Department deleted successfully', 200) : ApiResponse::error('Department not deleted', 400);
    }
}