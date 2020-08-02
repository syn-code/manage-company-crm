@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-inline-flex">
                    <p>
                        <a href="{{ url('/home') }}" class="btn btn-dark">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.854 4.646a.5.5 0 0 1 0 .708L5.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h6.5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="form-group">
            @include('includes.error')
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="name">Company Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Company Name">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="email">Company Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Company Email">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="website">Company Website</label>
                        <input type="text" id="website" name="website" value="{{ old('website') }}" class="form-control" placeholder="Company Website">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="logo">Company Logo <span class="text-danger">must be - (100 x 100)</span></label>
                        <input type="file" id="logo" name="logo" class="form-control-file">
                    </div>
                </div>
                <ul class="list-inline mt-3">
                    <li class="list-inline-item">
                        <button type="submit" class="btn btn-primary">
                            Create Company
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

    </div>
@endsection
