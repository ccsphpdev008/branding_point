<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('public/theme/admin/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name theme-custom-button-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth('admin')->user()->name }}</div>
            <div class="email theme-custom-button-color">{{ auth('admin')->user()->email }}</div>

            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>

                <ul class="dropdown-menu pull-right">
                    <li><a href="#profile" data-href="{{ route('admin.user.profile') }}" class="ajax-url ajax-profile-url profile-url theme-custom-text" data-type="profile"><i class="material-icons">person</i>Profile</a></li>
                    @if(auth('admin')->user()->role_id == 1)
                        <li><a href="#common/settings" data-href="{{ route('admin.common.setting') }}" class="ajax-url ajax-profile-url common-url theme-custom-text" data-type="common"><i class="material-icons">person</i>Common Settings</a></li>
                        <li><a href="{{ route('admin.logs') }}" class="theme-custom-text"><i class="material-icons">input</i>Log Reader</a></li>
                    @endif
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{ route('admin.logout') }}" class="theme-custom-text"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->

    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            @if(auth('admin')->user()->role_id == 1)
                <li class="header theme-custom-bg-color up-text">Super Admin Section</li>
                <li class="sidebar-item">
                    <a href="#roles" data-href="{{ route('admin.roles.index') }}" class="ajax-url sidebar-url roles-url" data-type="roles">
                        <i class="material-icons">vpn_key</i>
                        <span>Role Master</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#vendor" data-href="{{ route('admin.user_master.index') }}" class="ajax-url sidebar-url vendor-url" data-type="vendor">
                        <i class="material-icons">face</i>
                        <span>Vendors</span>
                    </a>
                </li>
            @endif
            <li class="header theme-custom-bg-color up-text">Navigation</li>
            <li class="sidebar-item active">
                <a href="#home" data-href="{{ route('admin.dashboard') }}" class="ajax-url sidebar-url home-url" data-type="home">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#category" data-href="{{ route('admin.category.index') }}" class="ajax-url sidebar-url category-url" data-type="category">
                    <i class="material-icons">home</i>
                    <span>Category</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#country" data-href="{{ route('admin.country.index') }}" class="ajax-url sidebar-url country-url" data-type="country">
                    <i class="material-icons">home</i>
                    <span>Country</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#state" data-href="{{ route('admin.state.index') }}" class="ajax-url sidebar-url state-url" data-type="state">
                    <i class="material-icons">home</i>
                    <span>State</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#city" data-href="{{ route('admin.city.index') }}" class="ajax-url sidebar-url city-url" data-type="city">
                    <i class="material-icons">home</i>
                    <span>City</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#product" data-href="{{ route('admin.product.index') }}" class="ajax-url sidebar-url product-url" data-type="product">
                    <i class="material-icons">home</i>
                    <span>Product</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#blog" data-href="{{ route('admin.blog.index') }}" class="ajax-url sidebar-url product-url" data-type="blog">
                    <i class="material-icons">home</i>
                    <span>Blog</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#banner" data-href="{{ route('admin.banner.index') }}" class="ajax-url sidebar-url product-url" data-type="blog">
                    <i class="material-icons">home</i>
                    <span>Banner</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#howitworks" data-href="{{ route('admin.howitworks.index') }}" class="ajax-url sidebar-url product-url" data-type="howitworks">
                    <i class="material-icons">home</i>
                    <span>HowItWorks</span>
                </a>
            </li>
            {{-- <li class="sidebar-item">
                <a href="#product" data-href="{{ route('admin.product.index') }}" class="ajax-url sidebar-url product-url" data-type="product">
                    <i class="material-icons">home</i>
                    <span>Product</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>
