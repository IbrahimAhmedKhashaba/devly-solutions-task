<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class EmployeesExport implements FromCollection, WithHeadings
{
    protected $department;

    public function __construct($department = null)
    {
        $this->department = $department;
    }

    public function collection()
    {
        $query = Employee::with('department');

        if ($this->department) {
            $query->where('department_id', $this->department->id);
        }

        return $query->get(['id', 'name', 'email', 'salary', 'department_id'])
            ->map(function ($employee) {
                return [
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'email' => $employee->email,
                    'salary' => $employee->salary,
                    'department' => $employee->department ? $employee->department->name : '',
                ];
            });
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Email', 'Salary' , 'Department'];
    }
}
