@extends('layouts.app')

@section('content')
    @if($searchResults->count() > 0)
        <table class="table">
            @include('companies.company-search.table.header.company-search-header')
            @foreach($searchResults as $company)
                @include('companies.company-search.table.row.company-search-row')
            @endforeach
        </table>
    @endif
@endsection
