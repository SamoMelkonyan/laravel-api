<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeesRequest;

class EmployeesController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::latest()->get();
        return view('employees.create', compact('companies'));
    }

    public function store(EmployeesRequest $request)
    {
        Employee::create($request->all());
        return  redirect()->route('employees.index')
            ->with('success_message', 'The employee has been successfully added');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::latest()->get();
        return view('employees.edit', compact('employee' ,'companies'));
    }

    public function update(EmployeesRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return  redirect()->route('employees.index')
            ->with('success_message', 'The employee has been successfully edited');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return  redirect()->route('employees.index')
            ->with('success_message', 'The employee has been successfully removed');
    }
}
