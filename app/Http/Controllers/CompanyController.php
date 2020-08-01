<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Interfaces\UploadInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Company;

class CompanyController extends Controller
{

    public function __construct()
    {
        //the is_admin middleware only applies to the below methods
        $this->middleware('is_admin', ['only' =>
            [
                'store',
                'create',
                'edit',
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        //return view('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('companies.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyRequest  $request
     * @param UploadInterface $upload
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request, UploadInterface $upload)
    {

        if (request()->has('logo')) {
            $storedLocation = $upload->handleFile($request->file('logo'));
            $request->logo = $storedLocation;
        }

       $createdCompany = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $request->logo ?? '',
            'website' => $request->website ?? '',
        ]);

        if (!isset($createdCompany)) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }

        flash("{$createdCompany->name} Created")->success();
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id = null): View
    {
        return view('companies.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCompany(Request $request)
    {
       $company =  Company::findOrfail($request->id);

       return response()->json($company);
    }

    public function showCompanies()
    {
        $data = Company::getAll();

        return view('companies.all-companies', [
            'data' => $data,
        ]);
    }
}
