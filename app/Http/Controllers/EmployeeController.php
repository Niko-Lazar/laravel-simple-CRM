<?php

namespace App\Http\Controllers;

use App\Enums\EmployeeRole;
use App\Models\Employee;
use Illuminate\Validation\Rules\Enum;

class EmployeeController extends Controller
{
    public function index()
    {
        // ? question mark
        return view('employees.index', ['employees' => Employee::with('superior')->get()]);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    public function create()
    {
        // scope
        return view('employees.create', ['superiors' => Employee::where('role', 'superior')->get()]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'phone' => 'required|numeric',
            'role' => ['nullable', new Enum(EmployeeRole::class)],
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
            'role' => ['nullable', new Enum(EmployeeRole::class)],
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
