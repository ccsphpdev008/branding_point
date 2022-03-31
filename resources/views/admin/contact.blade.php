@extends('admin.auth.auth_master')
@push('meta')
    <meta name="description" content="{{ isset($settings) && isset($settings['contact_description']) ? $settings['contact_description'] : '' }}" />
    <meta name="keywords" content="{{ isset($settings) && isset($settings['contact_keywords']) ? $settings['contact_keywords'] : '' }}" />
@endpush

@section('content')
    <div class="m-t-125 m-b-100 m-l-100 m-r-100">
        <h2 class="mb-4 text-center theme-custom-text m-b-50">Contact Us</h2>
        <div class="row clearfix">
            <div class="col-md-12 m-b-50">
                <p>{!! (isset($settings) && isset($settings['contact_us']) ? $settings['contact_us'] : '') !!}</p>
            </div>
            <div class="col-md-6">
                <p class="theme-custom-text">Please fill out the following information...</p>
                <form class="contact-form ajax-form" id="contact-form">
                    <div class="input-group tm-mb-30 ajax-div">
                        <div class="w-100"><input name="name" id="name" type="text" class="form-control rounded-0 ajax-required border-top-0 border-end-0 border-start-0" placeholder="Name"> <br></div>
                    </div>
                    <div class="input-group tm-mb-30 ajax-div">
                        <div class="w-100"><input name="email" id="email" type="text" class="form-control rounded-0 ajax-required border-top-0 border-end-0 border-start-0" placeholder="Email"> <br></div>
                    </div>
                    <div class="input-group tm-mb-30 ajax-div">
                        <div class="w-100"><textarea rows="5" name="message" id="message" class="textarea form-control rounded-0 ajax-required border-top-0 border-end-0 border-start-0" placeholder="Message"></textarea> <br></div>
                    </div>
                    <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="contact_success_msg"></div>
                    <div class="input-group justify-content-end m-t-125">
                        <div id="g-recaptcha-response-1"></div>
                        <input type="button" class="btn btn-primary tm-btn-pad-2" value="Send" id="save_info">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div>Email: <a href="mailto:{{ (isset($settings) && isset($settings['contact_email']) ? $settings['contact_email'] : '') }}" class="tm-link-white">{{ (isset($settings) && isset($settings['contact_email']) ? $settings['contact_email'] : '') }}</a></div>
                <div class="tm-mb-45">Tel: <a href="tel:0100200340" class="tm-link-white">{{ (isset($settings) && isset($settings['contact_no']) ? $settings['contact_no'] : '') }}</a></div>
                <!-- Map -->
                <div class="map-outer">
                    <div class="gmap-canvas">
                        <iframe width="100%" height="400" id="gmap-canvas"
                            src="https://maps.google.com/maps?width=400&amp;height=00&amp;hl=en&amp;q=nakshatra VIII, sadhu vasvani road, rajkot&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="seconds" id="seconds" value="{{ isset($settings) && isset($settings['notification_time']) ? $settings['notification_time'] : '10000' }}">
@endsection

@push('script')
    {!! NoCaptcha::renderJs() !!}
    <script type="text/javascript">
        jQuery(document).on('click', '#save_info', function(e){
            e.preventDefault();
            var vm = jQuery(this);

            if(formValidate(vm, 'contact-form')){
                jQuery.ajax({
                    'method': 'post',
                    'url': '{{ route("ajax.contact") }}',
                    'data': jQuery('.contact-form').serialize()
                }).done(function(responseData){
                    response = JSON.parse(responseData)
                    var data = '';
                    var placementFrom = 'top';
                    var placementAlign = 'right';
                    var animateEnter = 'animated lightSpeedIn';
                    var animateExit = 'animated lightSpeedOut';
                    var text = response.message;
                    var colorName = null;
                    var is_msg = false;
                    var timer = jQuery('#seconds').val();

                    if(response.status == 200){
                        vm.closest('.contact-form').find('.ajax-required').each(function(){
                            jQuery(this).val('');
                        });
                        var colorName = "alert-success";
                        var icon = '<i class="material-icons font-30 p-t-5 p-l-5">check_circle</i>';

                        setTimeout(()=>{
                            location.reload();
                        }, 3000);
                    }else{
                        var colorName = "alert-danger";
                        var icon = '<i class="material-icons font-30 p-t-5 p-l-5">error_outline</i>';
                    }
                    showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit, timer, icon);
                }).fail(function(error){
                    var err = error.responseJSON.errors;
                    jQuery.each(err, function(k, v){
                        if(k == 'g-recaptcha-response'){
                            jQuery('#g-recaptcha-response-1').html('<span class="ajax-span-required text-danger">Please check '+k+' field</span>');
                        }
                        vm.closest('.contact-form').find('#'+k).closest('.ajax-div').append('<span class="ajax-span-required text-danger">The '+k+' field is required</span>');
                    });
                });
            }
        });
    </script>
@endpush
