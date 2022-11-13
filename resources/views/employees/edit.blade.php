<x-layout>
    <div class="container">
        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PATCH')

            <div class="rendered-form">
                <div class="">
                    <h1 access="false" id="control-6169232">Edit Employee</h1></div>
                <div class="formbuilder-text form-group field-name">
                    <label for="name" class="formbuilder-text-label">Name<span class="formbuilder-required">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        value="{{ $employee->name }}"
                        access="false" id="name" required="required" aria-required="true">
                </div>

                <div class="formbuilder-text form-group field-email">
                    <label for="email" class="formbuilder-text-label">Email<span class="formbuilder-required">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="email"
                        value="{{ $employee->email }}"
                        access="false" id="email" required="required" aria-required="true">
                </div>

                <div class="formbuilder-text form-group field-phone">
                    <label for="phone" class="formbuilder-text-label">Phone<span class="formbuilder-required">*</span></label>
                    <input
                        type="text" class="form-control"
                        name="phone"
                        value="{{ $employee->phone }}"
                        access="false" id="phone" required="required" aria-required="true">
                </div>

                <div class="formbuilder-checkbox-group form-group field-superior">
                    <label for="superior" class="formbuilder-checkbox-group-label">Role</label>
                    <div class="checkbox-group">
                        <div class="formbuilder-checkbox">
                            <input
                                name="role"
                                access="false"
                                id="superior-0"
                                value="employee"
                                type="checkbox"
                                {{ ($employee->role == 'superior') ? 'checked' : null }}
                            >
                            <label for="superior-0">Superior</label>
                        </div>
                    </div>

                    <div class="formbuilder-select form-group field-role mt-2">
                        <label for="role" class="formbuilder-select-label">Superior</label>
                        <select class="form-control" name="employee_id" id="role">
                            <option value="" id="role-0">--Employee--</option>
                            @foreach($superiors as $superior)
                                <option
                                    value="{{ $superior->id }}"
                                    id="role-1"
                                    {{ ($employee->employee_id === $superior->id) ? 'selected' : null }}
                                >{{ $superior->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="formbuilder-button form-group field-submit mt-4">
                        <button type="submit" class="btn-info btn" name="submit" access="false" style="info" id="submit">Update Employee</button>
                    </div>
                </div>

                @if($errors->any())
                    <ul class="mt-3">
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
        </form>
    </div>
</x-layout>
