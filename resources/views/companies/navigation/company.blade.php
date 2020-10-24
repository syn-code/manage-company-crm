<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <span>{{ __('Company') }}</span>
                    </div>
                    <div class="col">
                        @include('components.search')
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <ul class="list-inline mx-auto">
                            @if ($isAdmin)
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
    </div>
</div>

