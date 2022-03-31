<div class="row w-100">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card">
            <div class="header">
                <h3 class="theme-text font-bold">{{ $title }}</h3>
                <ul class="header-dropdown m-r--5">
                    {!! $action !!}
                </ul>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="Form" data-action="{{ route($path.'image.store', [$id]) }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
                @csrf
                <div class="body">
                    <div class="row clearfix">
                        @include('admin.fields.image', ['field' => 'photo', 'efield' => 'Photo', 'required' => ''])
                    </div>
                    <button type="button" class="btn btn-theme waves-effect waves-light ajax-form-submit" data-type="Image">Add</button>
                </div>
            </form>

            <div class="p-l-20 p-r-20 m-t-30">
                <div class="row clearfix">
                    @foreach($images as $id => $image)
                        <div class="col-md-4 my-custom-image-card">
                            <div class="card">
                                <div class="header text-right">
                                    <a href="javascript:void(0)" data-href="{{ route($path.'image.delete', $id) }}" class="btn btn-xs btn-danger waves-effect waves-light custom_image_delete">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                </div>
                                <div class="body">
                                    <img src="{{ asset($image) }}" alt="Image" class="image-300-0">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
