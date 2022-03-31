<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ isset($settings) && isset($settings['app_favicon']) ? asset($settings['app_favicon']) : asset('public/favicon.ico') }}" type="image/x-icon">
    <title>{{ isset($settings) && isset($settings['app_name']) ? $settings['app_name'] : getenv('APP_NAME') }}</title>

    @include('admin.layout.header')
    @include('admin.layout.theme')
    @stack('style')
</head>

<body class="theme-custom">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-custom">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            {{-- <p>Please wait...</p> --}}
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Top Bar -->
    @include('admin.layout.topbar')
    <!-- #Top Bar -->

    <section>
        @include('admin.layout.sidebar')
    </section>

    <section class="content">
        <div class="container-fluid ajax-data-fill" id="ajax-data-fill">
            @yield('content')
        </div>
    </section>

    @include('admin.layout.footer')
    @stack('script')
</body>
</html>
