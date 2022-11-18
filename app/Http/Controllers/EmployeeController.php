<?php

namespace App\Http\Controllers;

use App\Enums\ROLE;
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

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'phone' => 'required|numeric',
            'role' => ['nullable', new Enum(ROLE::class)],
            'employee_id' => 'nullable'
        ]);

        Employee::create($attributes);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'superiors' => Employee::where('role', 'superior')->get()
        ]);
    }

    public function update(Employee $employee)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'phone' => 'required|numeric',
            'role' => ['nullable', new Enum(ROLE::class)],
            'employee_id' => 'nullable'
        ]);

        $employee->update($attributes);

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
