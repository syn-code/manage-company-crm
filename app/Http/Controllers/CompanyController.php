<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Interfaces\UploadInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Company;

class CompanyController extends Controller
{
    private $fileHandler;

    public function __construct()
    {

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
        /* TODO
            - validation added.
            - need to store the uploads into storage/app/pubic
            - save filename in db
            - make storage/app/public available to public/images
        */
        if (request()->has('logo')) {
            dd($upload);
        }


        Company::create($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
