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
        <!-- /.card-header -->
        <!-- form start -->
        @if(isset($data_type) && $data_type == 'edit')
            <form id="Form" data-action="{{ route($path.'update', [$record->id]) }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
            @method('PUT')
        @else
            <form id="Form" data-action="{{ route($path.'store') }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
        @endif
            @csrf
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        @include('admin.fields.select', ['field' => 'city_id', 'efield' => 'City', 'required' => 'required', 'array' => $cities])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.select', ['field' => 'category_id', 'efield' => 'Category', 'required' => 'required', 'array' => $categories])
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'title', 'efield' => 'Title', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'keywords', 'efield' => 'Keywords', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'longitude', 'efield' => 'Longitude', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'latitude', 'efield' => 'Latitude', 'required' => 'required'])
                    </div>
                    
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'address', 'efield' => 'Address', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'email', 'efield' => 'Email', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'phone', 'efield' => 'Phone', 'required' => 'required'])
                    </div>
                </div>
                
                <div class="row clearfix">
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'website', 'efield' => 'Website', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'fb_link', 'efield' => 'Facebook', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'twitter_link', 'efield' => 'Twitter', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'insta_link', 'efield' => 'Instagram', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'wp_link', 'efield' => 'Whatsapp', 'required' => 'required'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.fields.text', ['field' => 'website', 'efield' => 'LinkedIn', 'required' => 'required'])
                    </div>
                </div>
                <div class="col-md-6">
                    @include('admin.fields.checkbox', ['field' => 'is_check', 'efield' => 'Is Check?', 'required' => ''])
                </div>
                <div class="row clearfix">
                    @include('admin.fields.image', ['field' => 'backgroundimage', 'efield' => 'Image', 'required' => ''])
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        @include('admin.fields.textarea', ['field' => 'remarks', 'efield' => 'Remarks', 'required' => ''])
                    </div>
                </div>
                <button type="button" class="btn btn-theme waves-effect waves-light ajax-form-submit" data-type="{{ (isset($data_type) && $data_type == 'edit') ? 'Update' : 'Add' }}">
                    {{ (isset($data_type) && $data_type == 'edit') ? 'Update' : 'Add' }}
                </button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
