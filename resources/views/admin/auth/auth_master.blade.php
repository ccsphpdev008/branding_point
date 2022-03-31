<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @stack('meta')

    <link rel="icon" href="{{ isset($settings) && isset($settings['app_favicon']) ? asset($settings['app_favicon']) : asset('public/favicon.ico') }}" type="image/x-icon">
    <title>{{ isset($settings) && isset($settings['app_name']) ? $settings['app_name'] : getenv('APP_NAME') }}</title>

    @include('admin.layout.header')
    @include('admin.layout.theme')

    <style>
        .select2-selection{
            height: 100% !important;
        }
        .select2-selection__choice__display{
            color: #000; !important;
            font-weight: bold;
        }
        .hide{
            display: none !important;
        }
        .col-6{
            margin-bottom: 20px;
        }
    </style>

    @stack('style')
</head>

<!-- Top Bar -->
<!-- #Top Bar -->

<body class="theme-custom">
    @include('admin.layout.auth_topbar')
    <div class="login-box">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        @include('admin.layout.footer')

        @stack('script')
    </div>
</body>
</html>
