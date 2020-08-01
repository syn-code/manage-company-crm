<th scope="col">Company Logo</th>
<th scope="col">Company Name</th>
<th scope="col">Company Email</th>
<th scope="col">Company Website</th>
@if (auth()->user()->is_admin)
    <th scope="col">Edit Company</th>
@else
    <th scope="col">View Company</th>
@endif
<th scope="col"></th>

