<script src="{{ asset('public/theme/front/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/theme/front/js/plugins.js') }}"></script>
<script src="{{ asset('public/theme/front/js/scripts.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{!! NoCaptcha::renderJs() !!}

{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script>        
<script src="{{ asset('public/theme/front/js/map-single.js') }}"></script>  --}}
{{-- <script src="{{ asset('theme/front/js/index.js') }}"></script>
<script src="{{ asset('theme/front/js/demo.js') }}"></script> --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $("#main-register-form2").validate();

    jQuery(document).on('click', '#main-register-form2-button',function(event){
        event.preventDefault();
        jQuery('.dy-error').remove();

        let form = jQuery('#main-register-form2');
        let flag =1;
        if(form.find('#name').val() == ''){
            flag = 0;
            form.find('#name').parent().append('<span class="dy-error error-text">This field is required...</span>');
        }
        if(form.find('#email').val() == ''){
            flag = 0;
            form.find('#email').parent().append('<span class="dy-error error-text">This field is required...</span>');
        }
        if(form.find('#password').val() == ''){
            flag = 0;
            form.find('#password').parent().append('<span class="dy-error error-text">This field is required...</span>');
        }
        if(!form.find('#policy').prop('checked') ){
            flag = 0;
            form.find('#policy').parent().append('<span class="dy-error error-text">This field is required...</span>');
        }
        if(!form.find('#terms').prop('checked') ){
            flag = 0;
            form.find('#terms').parent().append('<span class="dy-error error-text">This field is required...</span>');
        }

            if(flag == 1){
            jQuery.ajax({
                url: '{{ route("register.save") }}',
                method: 'POST',
                data: {
                    'name' : form.find('#name').val(),
                    'email' : form.find('#email').val(),
                    'password' : form.find('#password').val(),
                }
            }).done(function(response){
                if(response.status == 200){
                    location.reload();
                }else{
                    form.find('#RegisterError').html(response.message);
                };
            }).fail(function(error){
                console.log(error);
            });
        }
    });
    
    jQuery(document).on('click', '#loginformbutton',function(event){
        event.preventDefault();
        jQuery('.dy-error').remove();

        let form = jQuery('#loginform');
        form.find('#loginError').html('');
        let flag = 1;
        if(form.find('#loginemail').val() == ''){
            flag = 0;
            form.find('#loginemail').parent().append('<span class="dy-error error-text">This field is required...</span>');
        }
        if(form.find('#loginpassword').val() == ''){
            flag = 0;
            form.find('#loginpassword').parent().append('<span class="dy-error error-text">This field is required...</span>');
        }

        if(flag == 1){
            jQuery.ajax({
                url: '{{ route("front.login.check") }}',
                method: 'POST',
                data: {
                    'email' : form.find('#loginemail').val(),
                    'password' : form.find('#loginpassword').val(),
                }
            }).done(function(response){
                if(response.status == 200){
                    location.reload();
                }else{
                    form.find('#loginError').html(response.message);
                }
                console.log(response);
            }).fail(function(error){
                console.log(error);
            });
        }
    
    });
</script>