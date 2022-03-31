<div class="form-group form-float ajax-div">
    <div class="form-line {{ old() && old($field) ? 'focused' : (isset($record) && $record->$field ? 'focused' : '') }}">
        <input type="text" class="form-control {{ $required ? 'ajax-required' : '' }}" name="{{ $field }}" value="{{ old() ? old($field) : (isset($record) ? $record->$field : '') }}" id="{{ $field }}" {{ $required }}>
        <label class="form-label theme-custom-text">{{ $efield }}{{ ($required) ? ' *' : '' }}</label>
    </div>
</div>
@error($field)
    <div style="color: red">{{$message}}</div>
@enderror
