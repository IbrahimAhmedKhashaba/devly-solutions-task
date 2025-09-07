@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
    </div>

    <div class="row">

        <!-- Update Info -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Profile Info</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                value="{{ old('name', auth()->user()->name) }}" 
                                class="form-control @error('name') is-invalid @enderror"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email', auth()->user()->email) }}" 
                                class="form-control @error('email') is-invalid @enderror"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Update Info</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Change Password</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-control @error('password') is-invalid @enderror"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation" 
                                class="form-control"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-success">Update Password</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
