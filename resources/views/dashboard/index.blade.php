@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-6">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <a href="{{ route('dashboard.departments.index') }}" style="text-decoration: none;">
                                    <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Departments</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $departments_count }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-6">
                            <div class="card border-left-success shadow h-100 py-2">
                                <a href="{{ route('dashboard.employees.index') }}" style="text-decoration: none;">
                                    <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Employees</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employees_count }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    

    </div>
@endsection