@extends('layouts.app')

@section('content')
    @if($searchResults->count() > 0)
        <table class="table">
            @include('companies.company-search.table.header.company-search-header')
            @foreach($searchResults as $company)
                @include('companies.company-search.table.row.company-search-row')
            @endforeach
        </table>
    @else
        <div class="alert alert-warning">
                <span>
                    There are no results for  "<b>{{ $_GET['company'] }}</b>"
                </span>
            <a href="/" class="btn btn-dark">Return Home</a>
        </div>
    @endif
@endsection
