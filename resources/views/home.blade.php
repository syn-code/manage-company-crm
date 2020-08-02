@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>
                    <div class="card-body">
                        <div class="container">
                        <div class="row">
                                <ul class="list-inline mx-auto">
                                    @if (auth()->user()->is_admin)
                                        <li class="list-inline-item">
                                            <a href="{{ route('company.create') }}" class="btn btn-primary">
                                                Add Company
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ url('show-companies') }}" class="btn btn-primary">
                                                Show Companies
                                            </a>
                                        </li>
                                    @else
                                        <li class="list-inline-item">
                                            <a href="{{ url('show-companies') }}" class="btn btn-primary">
                                                Show Companies
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">{{ __('Employee') }}</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <ul class="list-inline mx-auto">
                                @if (auth()->user()->is_admin)
                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-warning">
                                            Add Employee
                                        </button>
                                    </li>
                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-warning">
                                            Show Employees
                                        </button>
                                    </li>
                                @else

                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
