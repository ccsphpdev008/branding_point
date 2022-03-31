<input type="checkbox" id="{{ $field }}" name="{{ $field }}" class="chk-col-custom" {{ isset($record[$field]) && $record[$field] == true ? 'checked' : '' }}/>
<label for="{{ $field }}">{{ $efield }}</label>
