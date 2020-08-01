@foreach($data as $company)

    <tr>
        <td class="rounded">
            <img src="{{ asset('storage/'.$company->logo )}}" width="40" height="40">
        </td>
        <td>{{$company->name}}</td>
        <td>{{$company->email}}</td>
        <td>{{$company->website}}</td>
        <td>
            @if(auth()->user()->is_admin)
                <a href="{{ route('company.show', $company->id) }}" class="btn btn-primary">Edit Company</a>
            @else
                <a href="{{ route('company.show', $company->id) }}" class="btn btn-primary">View Company</a>
            @endif
        </td>
    </tr>

@endforeach
