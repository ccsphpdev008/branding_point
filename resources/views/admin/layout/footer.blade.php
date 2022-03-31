<!-- Jquery Core Js -->
<script src="{{ asset('public/theme/admin/plugins/jquery/jquery.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('public/theme/admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/morrisjs/morris.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('public/theme/admin/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/flot-charts/jquery.flot.time.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}">
</script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}">
</script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}">
</script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}">
</script>
<script src="{{ asset('public/theme/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}">
</script>

<!-- Datatable Plugin Js -->
<script src="{{ asset('public/theme/admin/js/pages/tables/jquery-datatable.js') }}"></script>

<!-- Dropzone Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/dropzone/dropzone.js') }}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('public/theme/admin/js/admin.js') }}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('public/theme/admin/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<script src="{{ asset('public/theme/admin/js/pages/ui/notifications.js') }}"></script>
<script src="{{ asset('public/theme/admin/js/pages/ui/animations.js') }}"></script>
<!-- Demo Js -->
<script src="{{ asset('public/theme/admin/js/demo.js') }}"></script>
<script src="{{ asset('public/theme/admin/js/custom.js') }}"></script>
<script src="{{ asset('public/theme/admin/progress_bar/prettify.min.js') }}"></script>
<script src="{{ asset('public/theme/admin/progress_bar/topbar.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('public/theme/admin/plugins/tags-input/jquery.tagsinput.min.js') }}"></script>

<input type="hidden" name="seconds" id="seconds"
    value="{{ isset($settings) && isset($settings['notification_time']) ? $settings['notification_time'] : '10000' }}">

<script>
    jQuery(document).ready(function() {
        var placementFrom = 'top';
        var placementAlign = 'right';
        var animateEnter = 'animated lightSpeedIn';
        var animateExit = 'animated lightSpeedOut';
        var text = null;
        var colorName = null;
        var is_msg = false;
        var timer =
            {{ isset($settings) && isset($settings['notification_time']) ? $settings['notification_time'] : '10000' }};

        @foreach (['success' => 'check_circle', 'info' => 'add_alert', 'warning' => 'warning', 'danger' => 'error_outline'] as $msg => $icon)
            @if (session()->has('flash_' . $msg))
                is_msg = true;
                // var colorName = "alert-{{ $msg }}";
                var icon = '<i class="material-icons font-30 p-t-5 p-l-5">{{ $icon }}</i>';
                var text = "{{ session()->get('flash_' . $msg) }}";
            @endif
        @endforeach

        if (is_msg) {
            showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit, timer,icon);
        }
    });

    function preview(id) {
        $('#' + id).removeClass('hide');
        $('#' + id).attr('src', URL.createObjectURL(event.target.files[0]));
        // $('#' + id).css({
        //     'height': '200px',
        //     'width': '200px'
        // });
    }

    jQuery(document).ready(function() {
        if (localStorage.getItem('response')) {
            sendNotification(JSON.parse(localStorage.getItem('response')));
            localStorage.removeItem('response')
        }

        //load view if page refresh
            loadView();
            function loadView() {
                var url = localStorage.getItem('ajax-load-url');
                var type = localStorage.getItem('ajax-load-type');
                if (url != '' && url != 'undefined' && url != null && type != '' && type != 'undefined' && type != null) {
                    pageLoadIn();

                    jQuery.ajax({
                        url: JSON.parse(url),
                        method: 'GET',
                    }).done(function(response) {
                        jQuery('.ajax-data-fill').html(response);
                        ajaxDatatableInitialize();

                        type = JSON.parse(type);
                        var vm = jQuery('.'+type+'-url');
                        if(vm.length > 0){
                            jQuery('.sidebar-item').removeClass('active');
                            vm.closest('.sidebar-item').addClass('active');
                        }

                        if(!vm.closest('ul').hasClass('ml-menu')){
                            var list = vm.closest('ul.list');
                            list.find('li.active').removeClass('active');
                            list.find('a.menu-toggle').removeClass('toggled');
                            list.find('ul.ml-menu').css("display", "none");
                        }else{
                            var main_li = vm.parent().parent().parent();
                            main_li.find('li.active').removeClass('active');
                            main_li.find('.menu-toggle').addClass('toggled');
                            main_li.find('.ml-menu').css("display", "block");
                            main_li.addClass('active');
                            vm.parent().addClass('active');
                        }

                        if (vm.hasClass('sidebar-url')) {
                            jQuery('.sidebar-item').removeClass('active');
                            vm.closest('.sidebar-item').addClass('active');
                        }
                        if (vm.hasClass('ajax-profile-url')) {
                            jQuery('.sidebar-item').removeClass('active');
                        }

                        pageLoadOut();
                    }).fail(function(error) {
                        pageLoadOut();
                    });
                }else{
                    type = window.location.hash.substr(1);
                    if (type && type != '') {
                        var vm = jQuery('a[href="#' + type + '"]');
                        if (vm.length > 0) {
                            pageLoadIn();
        
                            jQuery.ajax({
                                url: vm.attr('data-href'),
                                method: 'GET',
                            }).done(function(response) {
                                jQuery('.ajax-data-fill').html(response);
                                ajaxDatatableInitialize();
        
                                if(!vm.closest('ul').hasClass('ml-menu')){
                                    var list = vm.closest('ul.list');
                                    list.find('li.active').removeClass('active');
                                    list.find('a.menu-toggle').removeClass('toggled');
                                    list.find('ul.ml-menu').css("display", "none");
                                }else{
                                    var main_li = vm.parent().parent().parent();
                                    main_li.find('li.active').removeClass('active');
                                    main_li.find('.menu-toggle').addClass('toggled');
                                    main_li.find('.ml-menu').css("display", "block");
                                    main_li.addClass('active');
                                    vm.parent().addClass('active');
                                }
                                
                                if (vm.hasClass('sidebar-url')) {
                                    jQuery('.sidebar-item').removeClass('active');
                                    vm.closest('.sidebar-item').addClass('active');
                                }
                                if (vm.hasClass('ajax-profile-url')) {
                                    jQuery('.sidebar-item').removeClass('active');
                                }
        
                                pageLoadOut();
                            }).fail(function(error) {
                                pageLoadOut();
                            });
                        }
                    }
                }
            }
        //load view if page refresh

        //load view on url click
            jQuery(document).on('click', '.ajax-url', function(e) {
                jQuery('.bootstrap-notify-container.alert.alert-dismissible').remove();

                var vm = jQuery(this);
                pageLoadIn();
                
                jQuery.ajax({
                    url: vm.attr('data-href'),
                    method: 'GET',
                }).done(function(response) {
                    if (isJSON(response) && vm.attr('data-method-type') != 'delete') {
                        sendNotification(JSON.parse(response));
                    }else{
                        if (vm.attr('data-method-type') != 'delete') {
                            jQuery('.ajax-data-fill').html(response);
                            ajaxDatatableInitialize();
    
                            localStorage.setItem('ajax-load-url', JSON.stringify(vm.attr('data-href')));
                            localStorage.setItem('ajax-load-type', JSON.stringify(vm.attr('data-type')));
    
                            if (vm.hasClass('sidebar-url')) {
                                if(!vm.closest('ul').hasClass('ml-menu')){
                                    var list = vm.closest('ul.list');
                                    list.find('li.active').removeClass('active');
                                    list.find('a.menu-toggle').removeClass('toggled');
                                    list.find('ul.ml-menu').css("display", "none");
                                }else{
                                    var main_li = vm.parent().parent().parent();
                                    main_li.find('li.active').removeClass('active');
                                    main_li.find('.menu-toggle').addClass('toggled');
                                    main_li.find('.ml-menu').css("display", "block");
                                    main_li.addClass('active');
                                    vm.parent().addClass('active');
                                }
                                
                                jQuery('.sidebar-item').removeClass('active');
                                vm.closest('.sidebar-item').addClass('active');
                            }
                            if (vm.hasClass('ajax-profile-url')) {
                                jQuery('.sidebar-item').removeClass('active');
                            }
                        }else{
                            if (isJSON(response)) {
                                sendNotification(JSON.parse(response));
                            } else {
                                jQuery('.ajax-data-fill').html(response);
                                ajaxDatatableInitialize();
    
                                var title = jQuery.trim(jQuery('.ajax-data-fill').find('.page-title').html());
                                sendNotification({
                                    'message': title + '{{ config('message.delete_msg') }}',
                                    'type': 'success'
                                });
                            }
                        }
                    }
                    pageLoadOut();
                }).fail(function(error) {
                    pageLoadOut();
                });
            });
        //load view on url click

        //ajax form submit
            jQuery(document).on('click', '.ajax-form-submit', function(e) {
                var vm = jQuery(this);
                var form = vm.closest('#Form');
                jQuery('.ajax-span-required').remove();
                
                if(formValidate(form)){
                    pageLoadIn();
                    jQuery.ajax({
                        url: form.attr('data-action'),
                        enctype: 'multipart/form-data',
                        method: 'POST',
                        // dataType: "json",
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        data: new FormData(form[0]),
                    }).done(function(response) {
                        if(vm.attr('data-type') == 'Add' || vm.attr('data-type') == 'Update'){
                            localStorage.removeItem('ajax-load-url');
                            localStorage.removeItem('ajax-load-type');
                            
                            type = window.location.hash.substr(1).split('-');
                            window.location.hash = type[0];
                        }
                        
                        if (isJSON(response)) {
                            sendNotification(JSON.parse(response));
                            pageLoadOut();
                        } else {
                            jQuery('.ajax-data-fill').html(response);
                            ajaxDatatableInitialize();
                            pageLoadOut();
    
                            var title = jQuery.trim(jQuery('.ajax-data-fill').find('.page-title').html());
                            if (vm.attr('data-type') == 'Add') {
                                sendNotification({
                                    'message': title + "{{ config('message.add_msg') }}",
                                    'type': 'success'
                                });
                            } else if (vm.attr('data-type') == 'Image') {
                                sendNotification({
                                    'message': title + " Image {{ config('message.add_msg') }}",
                                    'type': 'success'
                                });
                            } else {
                                sendNotification({
                                    'message': title + "{{ config('message.update_msg') }}",
                                    'type': 'success'
                                });
                            }
                        }
                    }).fail(function(error) {
                        pageLoadOut();
                        var err = error.responseJSON.errors;
                        jQuery.each(err, function(k, v) {
                            form.find('#' + k)
                                .closest('.form-line')
                                .after('<span class="ajax-span-required text-danger">' + v[0] +'</span>');
                        });
                    });
                }
            });

            jQuery(document).on('click', '.custom_image_delete', function(e) {
                var vm = jQuery(this);
                pageLoadIn();

                jQuery.ajax({
                    url: vm.attr('data-href'),
                    enctype: 'multipart/form-data',
                    method: 'GET',
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                }).done(function(response) {
                    if (isJSON(response)) {
                        sendNotification(JSON.parse(response));
                        pageLoadOut();
                        vm.closest('.my-custom-image-card').remove();
                    }
                }).fail(function(error) {
                    pageLoadOut();
                });
            });
        //ajax form submit

        function isJSON(something) {
            if (typeof something != 'string')
                something = JSON.stringify(something);

            try {
                JSON.parse(something);
                return true;
            } catch (e) {
                return false;
            }
        }

        function sendNotification(response) {
            var colorName = null;
            var text = response.message;
            var notifiction_icon = {
                'success': 'check_circle',
                'info': 'add_alert',
                'warning': 'warning',
                'danger': 'error_outline'
            };
            var icon = '<i class="material-icons font-30 p-t-5 p-l-5">' + notifiction_icon[response.type] +
                '</i>';

            showNotification(colorName, text, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut',jQuery('#seconds').val(), icon);
        }

        function ajaxDatatableInitialize() {
            jQuery('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    // 'copy', 'csv', 'excel', 'pdf',
                    'print'
                ]
            });

            jQuery('.select2').select2({
                theme: 'classic'
            });
            jQuery('.summernote').summernote();
            
            jQuery('.tagInput').tagsInput({
                'tagClass': 'big',
                'height':'100px',
                'width':"100%",                
            });
        }

        function resetToDefaults() {
            topbar.config({
                autoRun: true,
                barThickness: 3,
                barColors: {
                    '0': 'rgba(26,  188, 156, .9)',
                    '.25': 'rgba(52,  152, 219, .9)',
                    '.50': 'rgba(241, 196, 15,  .9)',
                    '.75': 'rgba(230, 126, 34,  .9)',
                    '1.0': 'rgba(211, 84,  0,   .9)'
                },
                shadowBlur: 100,
                shadowColor: 'rgba(0,   0,   0,   .6)',
                className: 'topbar'
            })
        }

        function pageLoadIn() {
            pageLoadOut();

            topbar.show();
            jQuery('.page-loader-wrapper').fadeIn();
            jQuery('#ajax-data-fill').css('display', 'none');
        }

        pageLoadOut();
        function pageLoadOut() {
            resetToDefaults();
            jQuery('#ajax-data-fill').fadeIn('slow');
            jQuery('.page-loader-wrapper').fadeOut();
            topbar.hide();
        }
    });

    jQuery(document).on('blur', '.position', function(e) {
        var vm = jQuery(this);

        jQuery.ajax({
            url: "{{ route('admin.position.save') }}",
            type: 'POST',
            data: {
                'id': vm.attr('data-id'),
                'model': vm.attr('data-model'),
                'position': vm.val(),
                '_token': jQuery('meta[name="csrf-token"]').attr('content'),
            }
        }).done(function( responseText ) {
            var colorName = null;
            var text = 'Position Updated Successfully';
            var icon = '<i class="material-icons font-30 p-t-5 p-l-5">check_circle</i>';

            showNotification(colorName, text, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut','2000', icon);
        });
    });
</script>
