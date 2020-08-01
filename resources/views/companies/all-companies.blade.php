@extends('layouts.app')
@section('content')
            <div class="row">
                <table class="table table-striped text-center" id="companies-table">
                    @include('companies.table.table-header')
                    @include('companies.table.row')
                </table>
                {{ $data->links() }}
            </div>
@endsection
