<x-layout>
    <div class="container">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PATCH')

            <div class="rendered-form">
                <div class="">
                    <h1 access="false" id="control-6169232">Edit User</h1></div>
                <div class="formbuilder-text form-group field-name">
                    <label for="name" class="formbuilder-text-label">Name<span
                            class="formbuilder-required">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        value="{{ $user->name }}"
                        access="false" id="name" required="required" aria-required="true">
                </div>

                <div class="formbuilder-text form-group field-email">
                    <label for="email" class="formbuilder-text-label">Email<span
                            class="formbuilder-required">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="email"
                        value="{{ $user->email }}"
                        access="false" id="email" required="required" aria-required="true">
                </div>

                <div class="formbuilder-text form-group field-phone">
                    <label for="phone" class="formbuilder-text-label">Phone<span
                            class="formbuilder-required">*</span></label>
                    <input
                        type="text" class="form-control"
                        name="phone"
                        value="{{ $user->phone }}"
                        access="false" id="phone" required="required" aria-required="true">
                </div>

                <div class="formbuilder-select form-group field-role">
                    <label for="role" class="formbuilder-select-label">select user role</label>
                    <select class="form-control" name="role" id="role">
                        <option value="employee" selected="true" id="role-0">Employee</option>
                        <option value="superior" id="role-1">Superior</option>
                        <option value="viewer" id="role-2">Viewer</option>
                        <option value="admin" id="role-3">Admin</option>
                        <option value="superadmin" id="role-4">Superadmin</option>
                    </select>
                </div>

                <div class="formbuilder-select form-group field-role mt-2">
                    <label for="role" class="formbuilder-select-label">Superior</label>
                    <select class="form-control" name="user_id" id="role">
                        <option value="" id="role-0">--Superior--</option>
                        @foreach($superiors as $superior)
                            <option
                                value="{{ $superior->id }}"
                                id="role-1"
                                {{ ($user->user_id === $superior->id) ? 'selected' : null }}
                            >{{ $superior->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="formbuilder-button form-group field-submit mt-4">
                    <button type="submit" class="btn-info btn" name="submit" access="false" style="info" id="submit">
                        Update User
                    </button>
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
