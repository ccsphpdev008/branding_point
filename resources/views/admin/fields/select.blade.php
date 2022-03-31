<div class="form-line m-b-10 m-t-10 ajax-div">
    <span class="theme-custom-text"><b>{{ $efield }}{{ ($required) ? ' *' : '' }}</b></span>:&nbsp;&nbsp;
    <select name="{{ $field }}" id="{{ $field }}" class="form-control {{ $required ? 'ajax-required' : '' }} show-tick select2" data-live-search="true" {{ $required }}>
        <option value="">-select {{ $efield }}-{{ ($required) ? '*' : '' }}</option>
        @foreach($array as $key => $value)
            @if(old() && old($field) == $key || isset($record) && $record->$field == $key)
                <option value="{{ $key }}" selected>{{ $value }}</option>
            @elseif(isset($def_value) && $def_value == $key && !isset($record))
                <option value="{{ $key }}" selected>{{ $value }}</option>
            @else
                <option value="{{ $key }}">{{ $value }}</option>
            @endif
        @endforeach
    </select>
    @error($field)
        <div style="color: red">{{$message}}</div>
    @enderror
</div>
