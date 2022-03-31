@if($etype == 'hidden')
    <input data-slot="{{ isset($slot) ? $slot : '' }}" type="{{ $etype }}" name="{{ $field }}" value="{{ old() ? old($field) : (isset($ref_field) ? $ref_field : '') }}" class="form-control {{ $required ? 'ajax-required' : '' }} {{ isset($class) ? $class : '' }}" id="{{ $field }}" {{ $required }}>
@else
    <div class="form-group form-float ajax-div">
        <div class="form-line {{ old() && old($field) ? 'focused' : (isset($ref_field) ? 'focused' : '') }}">
            <input data-slot="{{ isset($slot) ? $slot : '' }}"type="{{ $etype }}" name="{{ $field }}" value="{{ old() ? old($field) : (isset($ref_field) ? $ref_field : '') }}" class="form-control {{ $required ? 'ajax-required' : '' }} {{ isset($class) ? $class : '' }}" id="{{ $field }}" {{ $required }}>
            <label class="form-label theme-custom-text">{{ $efield }}{{ ($required) ? ' *' : '' }}</label>
        </div>
    </div>
    @error($field)
        <div style="color: red">{{$message}}</div>
    @enderror
@endif
