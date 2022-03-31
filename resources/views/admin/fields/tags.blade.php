<div class="form-group form-float ajax-div">
    <label class="form-label theme-custom-text">{{ $efield }}{{ ($required) ? ' *' : '' }}</label>
    @if(isset($note))
        <label class="form-label theme-custom-text">({{ $note }})</label>
    @endif
    <div class="form-line {{ old() && old($field) ? 'focused' : (isset($record) && $record->$field ? 'focused' : '') }}">
        <input type="text" class="tagInput form-control {{ $required ? 'ajax-required' : '' }}" name="{{ $field }}" value="{{ old() ? old($field) : (isset($record) ? $record->$field : '') }}" id="{{ $field }}" {{ $required }}>
    </div>
</div>
@error($field)
    <div style="color: red">{{$message}}</div>
@enderror
