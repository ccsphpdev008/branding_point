<div class="form-group form-float ajax-div">
    <div class="form-line focused">
        <input type="date" class="form-control {{ $required ? 'ajax-required' : '' }}" name="{{ $field }}" value="{{ old() ? old($field) : (isset($record) ? $record->$field : now()) }}" id="{{ $field }}" {{ $required }}>
        <label class="form-label theme-custom-text">{{ $efield }}{{ ($required) ? ' *' : '' }}</label>
    </div>
</div>
@error($field)
    <div style="color: red">{{$message}}</div>
@enderror
