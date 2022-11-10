<x-layout>
    <div class="container">
        <form method="POST" action="{{ route('store_client') }}">
            @csrf
            <div class="rendered-form">
                <div class="formbuilder-text form-group field-name">
                    <label for="name" class="formbuilder-text-label">name<span class="formbuilder-required">*</span><span class="tooltip-element" tooltip="client's name">?</span></label>
                    <input type="text" placeholder="name" class="form-control" name="name" access="false" maxlength="255" id="name" title="client's name" required="required" aria-required="true">
                </div>
                <div class="formbuilder-text form-group field-logo">
                    <label for="logo" class="formbuilder-text-label">Logo<span class="formbuilder-required">*</span><span class="tooltip-element" tooltip="logo link">?</span></label>
                    <input type="text" placeholder="your logo" class="form-control" name="logo" access="false" id="logo" title="logo link" required="required" aria-required="true">
                </div>
                <div class="formbuilder-text form-group field-slug">
                    <label for="slug" class="formbuilder-text-label">Slug<span class="formbuilder-required">*</span></label>
                    <input type="text" placeholder="slug" class="form-control" name="slug" access="false" id="slug" required="required" aria-required="true">
                </div>
                <div class="formbuilder-text form-group field-website">
                    <label for="website" class="formbuilder-text-label">Website<span class="tooltip-element" tooltip="website url">?</span></label>
                    <input type="text" placeholder="url" class="form-control" name="website" access="false" id="website" title="website url">
                </div>
                <div class="formbuilder-button form-group field-submit">
                    <button type="submit" class="btn-info btn" name="submit" access="false" style="info" id="submit">Add client</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
