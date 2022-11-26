<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ValidateModel;
use App\Actions\ValidateEmployee;
use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateEmployeeRequest;
use App\Http\Requests\Admin\UpdateEmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::with(['superior', 'projects'])->simplePaginate(10)]
        );
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    public function create()
    {
        return view('employees.create', ['superiors' => Employee::superiors()->get()]);
    }

    public function store(ValidateEmployeeRequest $request, ValidateModel $validate)
    {
        Employee::create($validate->handle($request));

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'superiors' => Employee::where('role', Role::SUPERIOR)->get()
        ]);
    }

    public function update(Employee $employee, ValidateEmployeeRequest $request, ValidateModel $validate)
    {
        $employee->update($validate->handle($request));

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
