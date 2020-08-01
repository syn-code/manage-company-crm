@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                        <button type="button" class="btn btn-warning">
                                           Add Employee
                                        </button>
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
        </div>
    </div>
</div>
@endsection
