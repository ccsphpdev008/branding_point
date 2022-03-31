<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header" style="padding-top: 0; padding-bottom: 20px;">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand p-0" href="{{ route('admin.home') }}">
                <img src="{{ isset($settings) && isset($settings['app_logo']) ? asset($settings['app_logo']) : '' }}" style="width: 85px; height: 50px" />
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('admin.logout') }}" data-close="true"><i class="material-icons">power_settings_new</i></a></li>
            </ul>
        </div>
    </div>
</nav>
