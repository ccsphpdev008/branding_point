<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header" style="padding-top: 0; padding-bottom: 20px;">
            <a class="navbar-brand p-0" href="{{ route('admin.home') }}">
                <img src="{{ isset($settings) && isset($settings['app_logo']) ? asset($settings['app_logo']) : '' }}" style="width: 100px; height: 75px" />
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('login') }}" data-close="true">Login</a></li>
                <li><a href="{{ route('about') }}" data-close="true">About Us</a></li>
                <li><a href="{{ route('contact') }}" data-close="true">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
