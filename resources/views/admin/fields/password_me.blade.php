<div class="form-group form-float ajax-div">
    <div class="form-line">
        <input type="password" name="{{ $field }}" value="" class="form-control {{ $required ? 'ajax-required' : '' }}" id="{{ $field }}" {{ $required }}>
        <label class="form-label theme-custom-text">{{ $efield }}{{ ($required) ? ' *' : '' }}</label>
    </div>
</div>
@error($field)
    <div style="color: red">{{$message}}</div>
@enderror
@if(isset($record))
    <input type="checkbox" class="mt-3 chk-col-custom" name="change_password" id="change_password">
    <label for="change_password">Change Password</label>
@endif
