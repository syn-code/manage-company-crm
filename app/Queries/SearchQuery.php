<?php

namespace App\Queries;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class SearchQuery
{
    protected $searchQuery;
    protected $result;

    public function __construct($query)
    {
        $this->searchQuery = $query;
    }

    /**
     * @return Collection
     */
    public function searchCompany(): Collection
    {
        return DB::table('companies')
            ->where('name', 'like', $this->searchQuery.'%')
            ->leftJoin('employees', 'companies.id',  '=', 'employees.company_id')
            ->select([
                'companies.id',
                'companies.name as company_name',
                'companies.website as company_website',
                'companies.email as company_email',
                DB::raw('count(employees.company_id) as company_employee_count')
            ])
            ->groupBy('employees.company_id', 'companies.name','companies.website', 'companies.email')
            ->get();
    }

}
