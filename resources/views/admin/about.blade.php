@extends('admin.auth.auth_master')
@push('meta')
    <meta name="description" content="{{ isset($settings) && isset($settings['about_description']) ? $settings['about_description'] : '' }}" />
    <meta name="keywords" content="{{ isset($settings) && isset($settings['about_keywords']) ? $settings['about_keywords'] : '' }}" />
@endpush

@section('content')
    <div class="m-t-125 m-b-100 m-l-100 m-r-100">
        <h2 class="mb-4 text-center theme-custom-text">About Us</h2>
        <div class="row clearfix">
            <div class="col-md-12">
                <p class="m-t-50">{!! (isset($settings) && isset($settings['about_us']) ? $settings['about_us'] : '') !!}</p>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript"></script>
@endpush
