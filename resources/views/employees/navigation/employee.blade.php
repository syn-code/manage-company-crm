<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-5">
            <div class="card-header">{{ __('Employee') }}</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <ul class="list-inline mx-auto">
                            @if (auth()->user()->is_admin)
                                <li class="list-inline-item">
                                    <a href="{{ route('employee.create') }}" class="btn btn-warning">
                                        Add Employee
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ route('employee.all') }}" type="button" class="btn btn-warning">
                                        Show Employees
                                    </a>
                                </li>
                            @else
                                <li class="list-inline-item">
                                    <button type="button" class="btn btn-warning">
                                        Show Employees
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
