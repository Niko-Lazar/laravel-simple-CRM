<x-layout>
    <div class="container">
        <form method="POST" action="{{ route('assignProject.store') }}">
            @csrf

            <div class="rendered-form">
                <div><h1>Assign project</h1></div>

                <div class="formbuilder-text form-group field-name">
                    <label for="employee" class="formbuilder-text-label">Employee<span class="formbuilder-required">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        name="employee"
                        placeholder="{{ $user->name }}"
                        disabled
                        id="name" required="required" aria-required="true"
                    />
                </div>

                <div class="formbuilder-text form-group field-name">
                    <label for="email" class="formbuilder-text-label">email<span class="formbuilder-required">*</span></label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="{{ $user->email }}"
                        disabled
                        id="name" required="required" aria-required="true"
                    />
                </div>

                <input type="hidden" name="user_id" value="{{ $user->id }}" />

                <div class="formbuilder-select form-group field-project_id">
                    <label for="project_id" class="formbuilder-select-label">Select project</label>
                    <select class="form-control" name="project_id" id="project_id">
                        <option value="" selected>-- Project --</option>
                        @foreach($projects as $project)
                            <option value={{ $project->id }}>{{ $project->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="formbuilder-button form-group field-submit mt-4">
                    <button type="submit" class="btn-info btn" name="submit" id="submit">Assign project</button>
                </div>
            </div>

            @if($errors->any())
                <ul class="mt-3">
                    @foreach($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-block mt-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </form>
    </div>
</x-layout>
