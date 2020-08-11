@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <table class="table table-striped text-center">
            <tbody>
                @include('employees.table.header')
                @include('employees.table.row')
            </tbody>
        </table>
    </div>
@endsection
