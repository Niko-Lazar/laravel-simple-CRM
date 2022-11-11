<x-layout>
    <div class="container">
        <form method="POST" action="/clients/{{ $client->slug }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="rendered-form">
                <div class="formbuilder-text form-group field-name">
                    <label for="name" class="formbuilder-text-label">name<span class="formbuilder-required">*</span><span class="tooltip-element" tooltip="client's name">?</span></label>
                    <input
                        type="text"
                        placeholder="name"
                        class="form-control"
                        name="name"
                        value="{{ $client->name }}"
                        access="false" maxlength="255" id="name" title="client's name" required="required" aria-required="true">
                </div>

                <div class="formbuilder-file form-group field-logo">
                    <label for="logo" class="formbuilder-file-label">Upload logo<span class="formbuilder-required">*</span></label>
                    <input
                        type="file"
                        class="form-control"
                        name="logo"
                        access="false"
                        multiple="false" id="logo"
                        @if(!$client->logo)
                            required="required"
                        @endif
                        aria-required="true">
                    <img
                        src="{{ asset('storage/' . $client->logo) }}"
                        alt="logo" width="65px" height="64px"
                        class="rounded p-1"
                    >
                </div>

                <div class="formbuilder-text form-group field-slug">
                    <label for="slug" class="formbuilder-text-label">Slug<span class="formbuilder-required">*</span></label>
                    <input
                        type="text"
                        placeholder="slug"
                        class="form-control"
                        name="slug"
                        value="{{ $client->slug }}"
                        access="false" id="slug" required="required" aria-required="true">
                </div>
                <div class="formbuilder-text form-group field-website">
                    <label for="website" class="formbuilder-text-label">Website<span class="tooltip-element" tooltip="website url">?</span></label>
                    <input
                        type="text"
                        placeholder="url"
                        class="form-control"
                        name="website"
                        value="{{ $client->website }}"
                        access="false" id="website" title="website url">
                </div>
                <div class="formbuilder-button form-group field-submit">
                    <button type="submit" class="btn-info btn" name="submit" access="false" style="info" id="submit">Update</button>
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
        <a href="/clients" >back</a>
    </div>
</x-layout>
