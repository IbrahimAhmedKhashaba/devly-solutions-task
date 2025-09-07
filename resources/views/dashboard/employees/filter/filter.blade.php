<div class="card-body">
    <form action="{{ route('dashboard.employees.index') }}" method="get">
    <div class="row">
            <div class="col-2">
                <div class="from-group">
                    <select name="sort_by" class="form-control">
                        <option selected value="">Sort By</option>
                        <option value="id">Id</option>
                        <option value="name">Name</option>
                        <option value="email">Email</option>
                        <option value="salary">Salary</option>
                        <option value="created_at">Created_at</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="from-group">
                    <select name="order_by" class="form-control">
                        <option selected value="">Order By</option>
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="from-group">
                    <select name="limit" class="form-control">
                        <option selected value="">Limit</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="from-group">
                    <select name="department_id" class="form-control">
                        <option selected value="">Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="from-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search"/>
                </div>
            </div>
            <div class="col-1">
                <div class="from-group text-center">
                    <button type="submit" class="btn btn-info" >
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>