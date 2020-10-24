<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanySearchRequest;
use App\Queries\SearchQuery;
use Illuminate\View\View;

class CompanySearchController extends Controller
{
    //TODO refactor this into as a dependency injection to handle a search for employees
    // so that we can then inject the interface rather than instantiate the class
    /**
     * Company Search
     * @param  CompanySearchRequest  $request
     * @return View
     */
    public function search(CompanySearchRequest $request): View
    {
        $resultCollection = (new SearchQuery($request->company))->searchCompany();

        return view('companies.company-search.company-search-results', [
            'searchResults' => $resultCollection,
        ]);
    }

}
