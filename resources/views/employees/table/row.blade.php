@foreach($employees as $employee)
    <tr>
        <td>
            {{ $employee->full_name }}
        </td>
        <td>
            {{ $employee->email }}
        </td>
        <td>
            {{ $employee->company->name }}
        </td>
        <td>
            {{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') }}
        </td>
    </tr>
@endforeach
