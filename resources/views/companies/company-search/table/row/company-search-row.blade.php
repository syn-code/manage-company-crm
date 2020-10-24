<tr  class="text-center">
    <td>
        {{ $company->company_name }}
    </td>
    <td>
        {{ $company->company_website }}
    </td>
    <td>
        {{ $company->company_email }}
    </td>
    <td>
        {{ $company->company_employee_count }}
    </td>
    <td>
        <a href="{{ route('company.show', $company->id) }}" class="btn btn-primary">View Company</a>
    </td>
</tr>
