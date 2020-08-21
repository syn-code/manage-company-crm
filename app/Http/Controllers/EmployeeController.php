<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin', ['only' =>
            ['store', 'create']
         ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('employees.index', [
            'companies' => Company::getAll()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeRequest $request
     * @return redirect
     */
    public function store(EmployeeRequest $request)
    {
        dd('getting here');
       $employeeCreated = Employee::create($request->except('_token'));

        flash("Employee: {$employeeCreated->first_name} {$employeeCreated->last_name} has been added")->success();
        return redirect('/home');
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
    public function update(EmployeeUpdateRequest $request, int $id)
    {
        $employeeExist = Employee::findOrFail($id);

        try {
            Employee::where('id', $id)->update($request->all());
        } catch (QueryException $query) {
            return response()->json(['message' => 'Something went wrong'], 409);
        }

        return response()->json(['message' => "Employee {$request->first_name} {$request->last_name} has been updated"]);
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

    public function getAll(Request $request)
    {
        //TODO move this to the model, or create a repository
        $employees = Employee::where('company_id', $request->id)
            ->with('company')
            ->orderBy('first_name', 'asc')
            ->get()
            ->toArray();

        return response()->json($employees);
    }
}
