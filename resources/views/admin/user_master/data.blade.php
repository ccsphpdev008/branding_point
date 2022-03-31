<div class="row w-100">
    <!-- left column -->
    <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card">
        <div class="header">
        <h3 class="theme-custom-text font-bold">{{ $title }}</h3>
            <ul class="header-dropdown m-r--5">
                {!! $action !!}
            </ul>
        </div>
        <!-- /.header -->
        <!-- form start -->
        @if(isset($data_type) && $data_type == 'edit')
            <form id="Form" onkeydown="return event.key != 'Enter';" data-action="{{ route($path.'update', [$record->id]) }}" enctype="multipart/form-data" onsubmit="return submitForm(this)">
            @method('PUT')
        @else
            <form id="Form" onkeydown="return event.key != 'Enter';" data-action="{{ route($path.'store') }}" enctype="multipart/form-data" onsubmit="return submitForm(this)">
        @endif
            @csrf
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        @include('admin.fields.select', ['field' => 'role_id', 'efield' => 'Role', 'array' => $roles, 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'name', 'efield' => 'Name', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.number', ['field' => 'contact', 'efield' => 'Contact', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.email', ['field' => 'email', 'efield' => 'E-mail', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.password_me', ['field' => 'password', 'efield' => 'Password', 'required' => 'required'])
                    </div>


                    <div class="col-md-12 theme-custom-text">
                        <h3>Business Details</h3>
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'business_name', 'efield' => 'Business Name', 'required' => 'required'])
                    </div>
                </div>
                <div class="row clearfix">
                    @include('admin.fields.image', ['field' => 'business_logo', 'efield' => 'Business Logo', 'required' => ''])
                </div>
                <button type="button" class="btn btn-theme waves-effect waves-light ajax-form-submit" id="submit" name="submit" data-type="{{ (isset($data_type) && $data_type == 'edit') ? 'Update' : 'Add' }}">
                    {{ (isset($data_type) && $data_type == 'edit') ? 'Update' : 'Add' }}
                </button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>

{{-- <script>
    function submitForm(that , e){
        var submitBtn  = jQuery("#submit", that);
        var submitVal = submitBtn.val();

        var newsubmitVal = "Loading...";
        if(jQuery.trim(submitVal) == "Update"){
            var newsubmitVal = "Updating...";
        }
         if(jQuery.trim(submitVal) == "Add"){
            var newsubmitVal = "Creating...";
        }
        submitBtn.attr("disabled", true).val(newsubmitVal);
        if( typeof(CKEDITOR) !== "undefined" ){
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }
        var data = new FormData(that);
        jQuery.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: jQuery(that).attr("data-action"),
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (json) {
                submitBtn.removeAttr("disabled").val(submitVal);

                if(json.status == 200 && json.method != 'update'){
                    jQuery("#submit", that).find('input').val('');
                    jQuery("#submit", that).find('select').val('');
                    jQuery("#submit", that).find('textarea').val('');
                }
                sendNotification(json);
            },
            error: function (json) {
                submitBtn.removeAttr("disabled").val(submitVal);
                sendNotification(json);
            }
        });
 		return false;
    }
</script> --}}
