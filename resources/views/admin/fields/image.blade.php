<div class="col-md-5">
    <span class="theme-custom-text"><b>{{ $efield }}{{ ($required) ? ' *' : '' }}</b></span>
    <div class="form-group form-float ajax-div">
        <div class="form-line">
            <input type="file" accept="image/*" class="form-control {{ $required ? 'ajax-required' : '' }}" name="{{ $field }}" id="{{ $field }}" {{ $required }} onchange="preview('{{ $field }}_show')">
        </div>
    </div>
</div>
<div class=" col-md-2">
    <img id="{{ $field }}_show" src="" class="hide" width="60px" height="60px" />
</div>
<div class="col-md-5">
    @if(isset($record) && isset($record->$field))
        <img src="{{ isset($record) && isset($record->$field) ? asset($record->$field) : asset('public/no_img.jpg') }}" alt="Image" height="60px" width="60px">
    @endif
</div>

@error($field)
<div style="color: red">{{$message}}</div>
@enderror
