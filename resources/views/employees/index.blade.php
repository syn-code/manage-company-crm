@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.error')
            <form action="{{ route('employee.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input id="first-name" type="text" class="form-control" name="first_name">
                </div>

                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last-name">
                </div>

                <div class="form-group">
                    <label for="company-select">Employee Work Place</label>
                    <select class="form-control" name="company_id" id="company-select">
                        <option value="">Please Select</option>
                        @foreach ($companies as $id => $companyName)
                            <option value="{{ $id }}">{{ $companyName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Employee Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="phone">Employee Phone Number</label>
                    <input type="phone" class="form-control" name="phone" id="phone">
                </div>

                <ul class="list-unstyled">
                    <li class="list-inline-item">
                        <button type="submit" class="btn btn-primary">
                            Add Employee
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <button type="reset" class="btn btn-danger">
                            Reset
                        </button>
                    </li>

                </ul>
            </form>
    </div>



@endsection
