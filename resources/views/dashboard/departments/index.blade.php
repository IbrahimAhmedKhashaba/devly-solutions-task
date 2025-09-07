@extends('layouts.app')
@section(section: 'title')
    Departments
@endsection
@section('content')

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Departments Table</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @include('dashboard.departments.create')
                </div>
                @include('dashboard.departments.filter.filter')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Employees Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Employees Count</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse($departments as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->employees_count }}</td>
                                        
                                        <td>
                                            <div class="d-flex">
                                                @include('dashboard.departments.edit')
                                                
                                                <a class="btn" href="javascript:void(0)"
                                                    onclick="getElementById('delete-form-{{ $department->id }}').submit()"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                            <form id="delete-form-{{ $department->id }}" style="display: none;"
                                                action="{{ route('dashboard.departments.destroy', $department->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <div>No Department Found</div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $departments->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>

        </div>
@endsection
