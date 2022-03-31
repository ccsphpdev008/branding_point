<div class="form-group form-float ajax-div">
    <div class="form-line {{ old() && old($field) ? 'focused' : (isset($record) && $record->$field ? 'focused' : '') }}">
        <textarea name="{{ $field }}" id="{{ $field }}" rows="4" class="form-control {{ $required ? 'ajax-required' : '' }}" {{ $required }}>{{ old() ? old($field) : (isset($record) ? $record->$field : '') }}</textarea>
        <label class="form-label theme-custom-text">{{ $efield }}{{ ($required) ? ' *' : '' }}</label>
    </div>
</div>
@error($field)
    <div style="color: red">{{$message}}</div>
@enderror
