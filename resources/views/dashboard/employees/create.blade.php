
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Create Employee
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.employees.store') }}" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                        id="name" placeholder="Enter department Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    

                     
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control"
                                        id="email" placeholder="Enter Employee email">
                                </div>
                            </div>
                        </div>
                    
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="salary" class="form-control"
                                        id="salary" placeholder="Enter employee salary">
                                </div>
                            </div>
                        </div>
                    
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="department_id" class="form-control" id="department">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
