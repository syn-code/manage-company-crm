<form action="{{ route('company.search') }}" method="GET">
    @error('company')
        <span class="text-red">
            * Need a company name
        </span>
    @enderror
    <div class="input-group mb-3">
        <input type="text" class="form-control"  name="company" placeholder="" aria-label="" aria-describedby="search box"/>
        <div class="input-group-prepend">
            <button type="submit" role="button" class="btn btn-dark">Search</button>
        </div>
    </div>
</form>
