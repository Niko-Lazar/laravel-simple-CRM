<x-layout>
    <div class="container">
        <form method="POST" action="/projects/{{ $project->slug }}">
            @csrf
            @method('PATCH')
            <div class="rendered-form">
                <div class="">
                    <h1 access="false" id="control-6788589">Edit project</h1>
                </div>

                <div class="formbuilder-text form-group field-title">
                    <label for="title" class="formbuilder-text-label">Title<span class="formbuilder-required">*</span><span class="tooltip-element" tooltip="Project title">?</span></label>
                    <input
                        type="text"
                        placeholder="title"
                        class="form-control"
                        name="title"
                        value="{{ $project->title }}"
                        access="false" id="title" title="Project title" required="required" aria-required="true">
                </div>

                <div class="formbuilder-text form-group field-slug">
                    <label for="slug" class="formbuilder-text-label">Slug<span class="formbuilder-required">*</span></label>
                    <input
                        type="text"
                        placeholder="slug"
                        class="form-control"
                        name="slug"
                        value="{{ $project->slug }}"
                        access="false" id="slug" required="required" aria-required="true">
                </div>

                <div class="formbuilder-text form-group field-description">
                    <label for="description" class="formbuilder-text-label">Description<span class="formbuilder-required">*</span><span class="tooltip-element" tooltip="project description">?</span></label>
                    <input
                        type="text"
                        placeholder="description"
                        class="form-control"
                        name="description"
                        value="{{ $project->description }}"
                        access="false" id="description" title="project description" required="required" aria-required="true">
                </div>

                <div class="formbuilder-date form-group field-deadline">
                    <label for="deadline" class="formbuilder-date-label">Deadline<span class="formbuilder-required">*</span></label>
                    <input
                        type="date"
                        class="form-control"
                        name="deadline"
                        access="false"
                        value="{{ $project->deadline }}"
                        id="deadline" required="required" aria-required="true">
                </div>

                <div class="formbuilder-checkbox-group form-group field-status">
                    <label for="status" class="formbuilder-checkbox-group-label">Project status<span class="tooltip-element" tooltip="check if project is finished">?</span></label>
                    <div class="checkbox-group">
                        <div class="formbuilder-checkbox">
                            <input
                                name="status"
                                access="false"
                                id="status-0"
                                value="finished"
                                type="checkbox"
                                {{ ($project->status->value == 'finished') ? 'checked' : null }}
                            >
                            <label for="status-0">Finished project</label>
                        </div>
                    </div>
                </div>

                <div class="formbuilder-select form-group field-client">
                    <label for="client" class="formbuilder-select-label">Select client<span class="formbuilder-required">*</span></label>

                    <select class="form-control" name="client_id" id="client_id" required="required" aria-required="true">
                        <option value="" selected="true" disabled>--select client--</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ ($project->client_id == $client->id) ? 'selected' : null }}
                            >{{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="formbuilder-button form-group field-submit">
                    <button type="submit" class="btn-info btn mt-4" name="submit" access="false" id="submit">Update project</button>
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
