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
                        @include('admin.fields.text', ['field' => 'name', 'efield' => 'Name', 'required' => 'required'])
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        @include('admin.fields.select', ['field' => 'country_id', 'efield' => 'Country', 'required' => 'required', 'array' => $countries])
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        @include('admin.fields.textarea', ['field' => 'remarks', 'efield' => 'Remarks', 'required' => 'required'])
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
