<?php

namespace App\Http\Controllers;

use App\Enums\ROLE;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Validation\Rules\Enum;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::with(['superior', 'projects'])->get()]
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

    public function store(StoreEmployeeRequest $request)
    {
        $attributes = $request->validated();

        Employee::create($attributes);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'superiors' => Employee::where('role', ROLE::SUPERIOR)->get()
        ]);
    }

    public function update(Employee $employee, UpdateEmployeeRequest $update)
    {
        $attributes = $update->validated();

        $employee->update($attributes);

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
