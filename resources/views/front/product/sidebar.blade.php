<div class="col-md-3">
    <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
    <div class="clearfix"></div>
    <div class="fixed-bar fl-wrap" id="dash_menu">
        <div class="user-profile-menu-wrap fl-wrap block_box">
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Main</h3>
                <ul class="no-list-style">
                    <li><a href="{{ route('profile.dashboard')}}"><i class="fal fa-chart-line"></i>Dashboard</a></li>
                    <li><a href="{{ route('profile.edit')}}"><i class="fal fa-user-edit"></i> Edit profile</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <!-- user-profile-menu-->
            <div class="user-profile-menu">
                <h3>Listings</h3>
                <ul  class="no-list-style">
                    <li><a href="{{ route('profile.myproductlist')}}"><i class="fal fa-th-list"></i> My Product List  </a></li>
                    
                </ul>
            </div>
            <!-- user-profile-menu end-->
            <button class="logout_btn color2-bg">Log Out <i class="fas fa-sign-out"></i></button>
        </div>
    </div>
    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#dash_menu">Back to Menu<i class="fas fa-caret-up"></i></a>
    <div class="clearfix"></div>
</div>