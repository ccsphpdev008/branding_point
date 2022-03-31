<div class="col-md-6">
    <span class="theme-custom-text"><b>{{ $efield }}{{ ($required) ? ' *' : '' }}</b></span>
    <div class="form-group form-float ajax-div">
        <div class="form-line">
            <input type="file" accept="video/*" class="form-control {{ $required ? 'ajax-required' : '' }}" name="{{ $field }}" id="{{ $field }}" {{ $required }} onchange="preview('{{ $field }}_show_video')">
        </div>
    </div>
    <div class="">
        <video width="320" controls id="{{ $field }}_show_video" class="hide">
            <source src="" type="video/mp4">
        </video>
    </div>
</div>
<div class="col-md-6">
    @if(isset($record) && isset($record->$field) && file_exists($record->$field))
        <video width="320" controls>
            <source src="{{ isset($record) && isset($record->$field) ? asset($record->$field) : asset('public/no_img.jpg') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif
</div>
@error($field)
    <div style="color: red">{{$message}}</div>
@enderror
