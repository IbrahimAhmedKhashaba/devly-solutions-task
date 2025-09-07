@extends('layouts.app')
@section(section: 'title')
    Employees
@endsection
@section('content')

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Employees Table</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    @include('dashboard.employees.create')
                    <div class="w-50">
                        <form action="{{ route('dashboard.employees.export') }}" method="GET">
                            <div class="row g-2 justify-content-end">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="department" class="form-control">
                                            <option value="">كل الأقسام</option>
                                            @foreach($departments as $dep)
                                                <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" name="export" value="excel" class="btn btn-success w-100">
                                        Excel
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" name="export" value="pdf" class="btn btn-danger w-100">
                                        PDF
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                @include('dashboard.employees.filter.filter')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Salary</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Salary</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>{{ $employee->department->name }}</td>
                                        
                                        <td>
                                            <div class="d-flex">
                                                @include('dashboard.employees.edit')
                                                
                                                <a class="btn" href="javascript:void(0)"
                                                    onclick="getElementById('delete-form-{{ $employee->id }}').submit()"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                            <form id="delete-form-{{ $employee->id }}" style="display: none;"
                                                action="{{ route('dashboard.employees.destroy', $employee->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <div>No Employee Found</div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $employees->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>

        </div>
@endsection
