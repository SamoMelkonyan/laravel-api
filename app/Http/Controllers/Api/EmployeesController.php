<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\EmployeesRequest;

class EmployeesController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return response()->json($employees);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */


    /**
     * @param EmployeesRequest $request
     */
    public function store(EmployeesRequest $request)
    {
        Employee::create($request->all());
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }


    /**
     * @param EmployeesRequest $request
     * @param Employee $employee
     */
    public function update(EmployeesRequest $request, Employee $employee)
    {
        $employee->update($request->all());
    }

    /**
     * @param Employee $employee
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
    }
}
