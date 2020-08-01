@extends('layouts.app')
@section('content')
    <view-company-component is-admin="{{auth()->user()->is_admin }}"></view-company-component>
@endsection
