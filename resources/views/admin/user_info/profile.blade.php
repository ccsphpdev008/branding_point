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

        <form id="Form" onkeydown="return event.key != 'Enter';" data-action="{{ route('admin.user.profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <div class="row clearfix">
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
                    {{-- <div class="col-md-12">
                        @include('admin.fields.select', ['field' => 'theme_color', 'efield' => 'Theme Color', 'array' => ['red' => 'red', 'pink' => 'pink', 'purple' => 'purple', 'deep-purple' => 'deep-purple', 'indigo' => 'indigo', 'blue' => 'blue', 'light-blue' => 'light-blue', 'cyan' => 'cyan', 'teal' => 'teal', 'green' => 'green', 'light-green' => 'light-green', 'lime' => 'lime', 'yellow' => 'yellow', 'amber' => 'amber', 'orange' => 'orange', 'deep-orange' => 'deep-orange', 'brown' => 'brown', 'grey' => 'grey', 'blue-grey' => 'blue-grey', 'black' => 'black'], 'required' => 'required'])
                    </div> --}}
                    <div class="col-md-2">
                        @include('admin.fields.color', ['field' => 'text_color', 'efield' => 'Text Color', 'required' => 'required'])
                    </div>
                    <div class="col-md-2">
                        @include('admin.fields.color', ['field' => 'bg_color', 'efield' => 'Background Color', 'required' => 'required'])
                    </div>
                    <div class="col-md-2">
                        @include('admin.fields.color', ['field' => 'button_color', 'efield' => 'Button Text Color', 'required' => 'required'])
                    </div>
                </div>
                <button type="button" class="btn btn-theme waves-effect waves-light ajax-form-submit" data-type="Update">Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
