<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Company;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();
        // echo "<pre>";
        // print_r($employees->toArray());
        // die;
        return view('backend.show_employee',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view('backend.add_employee', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company_id' => 'required'
        ]);

        $employee = new Employees;
        $employee->firstName = $request->fname;
        $employee->lastName = $request->lname;
        $employee->company_id = $request->company_id;
        $employee->save();
        return redirect()->back()->with('message',"added successfully");
    }

    /**
     *
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
        $company = Company::all();
        $employee = Employees::find($id);
        return view('backend.update_employee',compact('employee','company'));

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
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company_id' => 'required'
        ]);

        $employee = Employees::find($id);
        $employee->firstName = $request->fname;
        $employee->lastName = $request->lname;
        $employee->company_id = $request->company_id;
        $employee->save();

        $employees = Employees::all();

        return view('backend.show_employee',compact('employees'))->with('message','update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::find($id)->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
}
