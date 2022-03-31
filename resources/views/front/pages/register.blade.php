<div class="main-register-wrap modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_main">
            <div class="main-register_title">Welcome to <span><strong>Town</strong>Hub<strong>.</strong></span></div>
            <div class="close-reg"><i class="fal fa-times"></i></div>
            <ul class="tabs-menu fl-wrap no-list-style">
                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
            </ul>
            <!--tabs -->                       
            <div class="tabs-container">
                <div class="tab">
                    <!--tab -->
                    <div id="tab-1" class="tab-content first-tab">
                        <div class="custom-form">
                            <form name="loginform" id="loginform" class="text-left">
                                @csrf
                                <div>
                                    <label>Email Address <span>*</span> </label>
                                    <input id="loginemail" name="email" type="text" class="m-0" onClick="this.select()">
                                </div>
                                <div>
                                    <label >Password <span>*</span> </label>
                                    <input id="loginpassword" name="password" class="m-0" type="password" onClick="this.select()">
                                </div>
                                <button type="button" id="loginformbutton" class="btn float-btn color2-bg"> Log In <i class="fas fa-caret-right"></i></button>
                                <div class="clearfix"></div>
                                <div>
                                    <span id="loginError" class="text-danger"></span>
                                </div>
                                <div class="filter-tags">
                                    <input id="check-a3" type="checkbox" name="check">
                                    <label for="check-a3">Remember me</label>
                                </div>
                            </form>
                            <div class="lost_password">
                                <a href="{{route('forget.password.get')}}">Lost Your Password?</a>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-2" class="tab-content">
                            <div class="custom-form">
                                <form  name="registerform" class="main-register-form text-left" id="main-register-form2">
                                    @csrf
                                    <div>
                                        <label >Full Name <span>*</span> </label>
                                        <input id="name" name="name" type="text" class="m-0"  onClick="this.select()" value="">
                                    </div>
                                    <div>
                                        <label>Email Address <span>*</span></label>
                                        <input id="email" name="email" type="text" class="m-0" onClick="this.select()" value="">
                                    </div>
                                    <div>
                                        <label >Password <span>*</span></label>
                                        <input id="password" name="password" type="password" class="m-0"  onClick="this.select()" value="" >
                                    </div>
                                    <div class="filter-tags ft-list">
                                        <input id="policy" type="checkbox" name="check">
                                        <label for="policy">I agree to the <a href="#">Privacy Policy</a></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags ft-list">
                                        <input id="terms" type="checkbox" name="check">
                                        <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
                                    </div>
                                    <div>
                                        <span id="RegisterError" class="text-danger"></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="button" class="btn float-btn color2-bg" id="main-register-form2-button"> Register  <i class="fas fa-caret-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                </div>
                <!--tabs end -->
                <div class="soc-log fl-wrap"></div>
                <div class="wave-bg">
                    <div class='wave -one'></div>
                    <div class='wave -two'></div>
                </div>
            </div>
        </div>
    </div>
</div>