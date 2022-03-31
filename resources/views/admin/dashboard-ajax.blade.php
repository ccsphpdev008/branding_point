<div class="row m-b-30">
    <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 theme-custom-text">
        Welcome to {{ isset($settings) && isset($settings['app_name']) ? $settings['app_name'] : getenv('APP_NAME') }} Dashboard
    </h3>
</div>

<div class="row clearfix no-select">
    @if(auth('admin')->user()->role_id == 1)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-2 bg-custom hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Users</div>
                        <div class="number count-to" data-from="0" data-to="{{ $total_users }}" data-speed="2000" data-fresh-interval="20">{{ $total_users }}</div>
                    </div>
                </div>
            {{-- </a> --}}
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box-2 bg-custom hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <div class="content">
                    <div class="text">Roles</div>
                    <div class="number count-to" data-from="0" data-to="{{ $total_roles }}" data-speed="2000" data-fresh-interval="20">{{ $total_roles }}</div>
                </div>
            </div>
        </div>
    @endif
</div>
