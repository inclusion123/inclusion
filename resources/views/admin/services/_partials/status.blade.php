<div class="custom-control custom-switch">
    <input data-id="{{ $row->id }}" type="checkbox" data-on="Active" data-off="InActive"
         class="custom-control-input" id="customSwitches_{{ $row->id }}" {{ $row->status ? 'checked' : '' }}>
    <label class="custom-control-label" for="customSwitches_{{ $row->id }}"></label>
</div>
