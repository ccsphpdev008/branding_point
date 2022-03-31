jQuery(document).ready(function () {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(() => {
        jQuery('.5stime').remove();
    }, 5000);
});

function formValidate(form) {
    var flg = 1;
    form.find('.ajax-span-required').remove();

    if (form.find('.ajax-required').length > 0) {
        form.find('.ajax-required').each(function () {
            var type = jQuery(this).attr('type');
            if (jQuery(this).val() == '') {
                flg = 0;
                var name = jQuery(this).attr('name').replace(/_/g, ' ').replace(/id/g, '');
                jQuery(this).closest('.ajax-div').append('<div class="ajax-span-required text-danger">The ' + name + ' field is mandatory.</div>');
            } else if (type == 'email') {
                if (!IsEmail(jQuery(this).val())) {
                    flg = 0;
                    var name = jQuery(this).attr('name').replace(/_/g, ' ').replace(/id/g, '');
                    jQuery(this).closest('.ajax-div').append('<div class="ajax-span-required text-danger">Please provide proper ' + name + '.</div>');
                }
            }
        });
    }

    if (flg == 1) {
        return true;
    }
    return false;
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
