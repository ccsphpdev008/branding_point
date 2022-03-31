<div class="row w-100">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h3 class="theme-custom-text font-bold">{{ $title }}</h3>
            <ul class="header-dropdown m-r--5">
                {!! $action !!}
            </ul>
            </div>

            <form id="Form" onkeydown="return event.key != 'Enter';" data-action="{{ route('admin.common.setting.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('app_name') ? 'focused' : (isset($record) && isset($record['app_name']) ? 'focused' : '') }}">
                                    <input type="text" class="form-control" name="app_name" value="{{ old() ? old('app_name') : (isset($record) && isset($record['app_name']) ? $record['app_name'] : '') }}" id="app_name" required>
                                    <label class="form-label theme-custom-text">App Name*</label>
                                </div>
                            </div>
                            @error('app_name')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('notification_time') ? 'focused' : (isset($record) && isset($record['notification_time']) ? 'focused' : '') }}">
                                    <input type="number" class="form-control" name="notification_time" value="{{ old() ? old('notification_time') : (isset($record) && isset($record['notification_time']) ? $record['notification_time'] : '') }}" id="notification_time" required>
                                    <label class="form-label theme-custom-text">Notification Timer*</label>
                                </div>
                            </div>
                            @error('notification_time')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('contact_no') ? 'focused' : (isset($record) && isset($record['contact_no']) ? 'focused' : '') }}">
                                    <input type="number" class="form-control" name="contact_no" value="{{ old() ? old('contact_no') : (isset($record) && isset($record['contact_no']) ? $record['contact_no'] : '') }}" id="contact_no" required>
                                    <label class="form-label theme-custom-text">Contact Person Number*</label>
                                </div>
                            </div>
                            @error('contact_no')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <input type="color" class="form-control" name="text_color" value="{{ old() ? old('text_color') : (isset($record) && isset($record['text_color']) ? $record['text_color'] : '') }}" id="text_color" required>
                                    <label class="form-label theme-custom-text">Text Color*</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <input type="color" class="form-control" name="bg_color" value="{{ old() ? old('bg_color') : (isset($record) && isset($record['bg_color']) ? $record['bg_color'] : '') }}" id="bg_color" required>
                                    <label class="form-label theme-custom-text">BackGround Color*</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div><b>App Color*</b></div>
                            <select name="app_color" id="app_color" class="form-control select2 show-tick" data-live-search="true" required>
                                <option value="">-select-</option>
                                @foreach(['red' => 'red', 'pink' => 'pink', 'purple' => 'purple', 'deep-purple' => 'deep-purple', 'indigo' => 'indigo', 'blue' => 'blue', 'light-blue' => 'light-blue', 'cyan' => 'cyan', 'teal' => 'teal', 'green' => 'green', 'light-green' => 'light-green', 'lime' => 'lime', 'yellow' => 'yellow', 'amber' => 'amber', 'orange' => 'orange', 'deep-orange' => 'deep-orange', 'brown' => 'brown', 'grey' => 'grey', 'blue-grey' => 'blue-grey', 'black' => 'black'] as $key => $value)
                                    @if(old() && old('app_color') == $key || isset($record)&& isset($record['app_color']) && $record['app_color'] == $key)
                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('app_color')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="row clearfix hide">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('item_slots') ? 'focused' : (isset($record) && isset($record['item_slots']) ? 'focused' : '') }}">
                                    <input type="text" class="form-control" name="item_slots" value="{{ old() ? old('item_slots') : (isset($record) && isset($record['item_slots']) ? $record['item_slots'] : '') }}" id="item_slots" required readonly disabled>
                                    <label class="form-label theme-custom-text">Item Slots*</label>
                                </div>
                            </div>
                            @error('item_slots')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6 m-t-20">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('mail_to_email') ? 'focused' : (isset($record) && isset($record['mail_to_email']) ? 'focused' : '') }}">
                                    <input type="email" class="form-control" name="mail_to_email" value="{{ old() ? old('mail_to_email') : (isset($record) && isset($record['mail_to_email']) ? $record['mail_to_email'] : '') }}" id="mail_to_email" required>
                                    <label class="form-label theme-custom-text">Mail To E-mail*</label>
                                </div>
                            </div>
                            @error('mail_to_email')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 m-t-20">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('contact_email') ? 'focused' : (isset($record) && isset($record['contact_email']) ? 'focused' : '') }}">
                                    <input type="email" class="form-control" name="contact_email" value="{{ old() ? old('contact_email') : (isset($record) && isset($record['contact_email']) ? $record['contact_email'] : '') }}" id="contact_email" required>
                                    <label class="form-label theme-custom-text">Contact Person Email*</label>
                                </div>
                            </div>
                            @error('contact_email')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 m-t-20">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('contact_page_address') ? 'focused' : (isset($record) && isset($record['contact_page_address']) ? 'focused' : '') }}">
                                    <input type="email" class="form-control" name="contact_page_address" value="{{ old() ? old('contact_page_address') : (isset($record) && isset($record['contact_page_address']) ? $record['contact_page_address'] : '') }}" id="contact_page_address" required>
                                    <label class="form-label theme-custom-text">Contact Page Address*</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-20">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('contact_page_address') ? 'focused' : (isset($record) && isset($record['contact_page_address']) ? 'focused' : '') }}">
                                    <input type="email" class="form-control" name="contact_page_address" value="{{ old() ? old('contact_page_address') : (isset($record) && isset($record['contact_page_address']) ? $record['contact_page_address'] : '') }}" id="contact_page_address" required>
                                    <label class="form-label theme-custom-text">Facebook*</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-20">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('contact_page_address') ? 'focused' : (isset($record) && isset($record['contact_page_address']) ? 'focused' : '') }}">
                                    <input type="email" class="form-control" name="contact_page_address" value="{{ old() ? old('contact_page_address') : (isset($record) && isset($record['contact_page_address']) ? $record['contact_page_address'] : '') }}" id="contact_page_address" required>
                                    <label class="form-label theme-custom-text">Twitter</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-20">
                            <div class="form-group form-float">
                                <div class="form-line {{ old() && old('contact_page_address') ? 'focused' : (isset($record) && isset($record['contact_page_address']) ? 'focused' : '') }}">
                                    <input type="email" class="form-control" name="contact_page_address" value="{{ old() ? old('contact_page_address') : (isset($record) && isset($record['contact_page_address']) ? $record['contact_page_address'] : '') }}" id="contact_page_address" required>
                                    <label class="form-label theme-custom-text">Instagram</label>
                                </div>
                            </div>
                        </div>
                            @error('contact_page_address')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="col-md-8">
                                <span><b>App Logo</b></span>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" accept="image/*" class="form-control" name="app_logo" id="app_logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ (isset($record) && isset($record['app_logo']) ? asset($record['app_logo']) : asset('public/no_img.jpg')) }}" alt="Image" height="60px" width="60px">
                            </div>
                            @error('app_logo')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-8">
                                <span><b>App Favicon</b></span>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" accept=".ico" class="form-control" name="app_favicon" id="app_favicon">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ (isset($record) && isset($record['app_favicon']) ? asset($record['app_favicon']) : asset('public/no_img.jpg')) }}" alt="Image" height="60px" width="60px">
                            </div>
                            @error('app_favicon')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <span><b>Contact page About </b></span>
                            <div class="form-group form-float">
                                <div class="form-line {{(isset($record) && isset($record['contact_page_about_us']) ? 'focused' : '')}}">
                                    <textarea rows="3" type="text" id="contact_page_about_us" class="form-control summernote" name="contact_page_about_us">{{(isset($record) && isset($record['contact_page_about_us']) ? $record['contact_page_about_us'] : '')}}</textarea>
                                </div>
                            </div>
                            @error('contact_page_about_us')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <span><b>About us</b></span>
                            <div class="form-group form-float">
                                <div class="form-line {{(isset($record) && isset($record['about_us']) ? 'focused' : '')}}">
                                    <textarea rows="3" type="text" id="about_us" class="form-control summernote" name="about_us">{{(isset($record) && isset($record['about_us']) ? $record['about_us'] : '')}}</textarea>
                                </div>
                            </div>
                            @error('about_us')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <span><b>Contact us</b></span>
                            <div class="form-group form-float">
                                <div class="form-line {{(isset($record) && isset($record['contact_us']) ?'focused' : '')}}">
                                    <textarea rows="3" type="text" id="contact_us" class="form-control summernote" name="contact_us">{{(isset($record) && isset($record['contact_us']) ? $record['contact_us'] : '')}}</textarea>
                                </div>
                            </div>
                            @error('contact_us')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <span><b>Our Services</b></span>
                            <div class="form-group form-float">
                                <div class="form-line {{(isset($record) && isset($record['our_service']) ?'focused' : '')}}">
                                    <textarea rows="3" type="text" id="our_service" class="form-control summernote" name="our_service">{{(isset($record) && isset($record['our_service']) ? $record['our_service'] : '')}}</textarea>
                                </div>
                            </div>
                            @error('our_service')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <span><b>Privacy Policy</b></span>
                            <div class="form-group form-float">
                                <div class="form-line {{(isset($record) && isset($record['privacy_policy']) ?'focused' : '')}}">
                                    <textarea rows="3" type="text" id="privacy_policy" class="form-control summernote" name="privacy_policy">{{(isset($record) && isset($record['privacy_policy']) ? $record['privacy_policy'] : '')}}</textarea>
                                </div>
                            </div>
                            @error('privacy_policy')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <span><b>Return Policy</b></span>
                            <div class="form-group form-float">
                                <div class="form-line {{(isset($record) && isset($record['return_policy']) ?'focused' : '')}}">
                                    <textarea rows="3" type="text" id="return_policy" class="form-control summernote" name="return_policy">{{(isset($record) && isset($record['return_policy']) ? $record['return_policy'] : '')}}</textarea>
                                </div>
                            </div>
                            @error('return_policy')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <span><b>Terms & Conditions</b></span>
                            <div class="form-group form-float">
                                <div class="form-line {{(isset($record) && isset($record['term_condition']) ?'focused' : '')}}">
                                    <textarea rows="3" type="text" id="term_condition" class="form-control summernote" name="term_condition">{{(isset($record) && isset($record['term_condition']) ? $record['term_condition'] : '')}}</textarea>
                                </div>
                            </div>
                            @error('term_condition')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <span><b>Brand Images</b></span>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="file" accept="image/*" class="form-control" name="brand_image" id="brand_image">
                                </div>
                            </div>
                            @error('brand_image')
                                <div style="color: red">{{$message}}</div>
                            @enderror
                            @if(isset($more_settings) && count($more_settings) > 0)
                                <div class="row clearfix no-select">
                                    @foreach($more_settings as $key => $data)
                                        <div class="col-md-3 image-remove">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-right text-danger pointer" data-id="{{ $key }}"><i class="material-icons">delete_forever</i></div>
                                                    <img src="{{ asset($data) }}" alt="Activity Image" width="100%" height="150px">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <button type="button" class="btn btn-theme waves-effect waves-light ajax-form-submit" data-type="Update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    jQuery(document).on('click', '.pointer', function(e) {
        var vm = jQuery(this);
        var id = vm.attr('data-id');
        var data = {
            'id': id,
        };

        jQuery.ajax({
            'method': 'POST',
            'url': '{{ route("admin.common.setting.delete") }}',
            'data': data
        }).done(function(response){
            if(response == '1'){
                vm.closest('.image-remove').remove();
            }
        });
    });
</script>
