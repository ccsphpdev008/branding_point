<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Townhub - Directory Listing Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!--=============== css  ===============-->	
        @include('front.layout.links')

        @stack('styles')
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <div class="loader-inner-cirle"></div>
            </div>
        </div>
        <!--loader end-->
        <!-- main start  -->
        <div id="main">
            
            @include('front.layout.header')

            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                  
                    @yield('content')
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->
           
            @include('front.layout.footer')

            <!--map-modal -->
            @include('front.pages.listingtitle')
            <!--map-modal end -->                
            <!--register form -->
            @include('front.pages.register')
            <!--register form end -->
            <a class="to-top"><i class="fas fa-caret-up"></i></a>     
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        @include('front.layout.scripts')                    

        @stack('scripts')
    </body>
</html>