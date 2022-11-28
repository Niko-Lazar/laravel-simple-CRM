<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateModel;
use App\Actions\UpdateModel;
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
        $this->authorize('create', Employee::class);

        return view('employees.create', ['superiors' => Employee::superiors()->get()]);
    }

    public function store(Employee $employee, ValidateEmployeeRequest $request, CreateModel $createModel)
    {
        $this->authorize('create', Employee::class);

        $createModel->handle($employee, $request);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $this->authorize('update', Employee::class);

        return view('employees.edit', [
            'employee' => $employee,
            'superiors' => Employee::where('role', Role::SUPERIOR)->get()
        ]);
    }

    public function update(Employee $employee, ValidateEmployeeRequest $request, UpdateModel $updateModel)
    {
        $this->authorize('update', Employee::class);

        $updateModel->handle($employee, $request);

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $this->authorize('delete', Employee::class);

        $employee->delete();

        return redirect()->route('employees.index');
    }
}
