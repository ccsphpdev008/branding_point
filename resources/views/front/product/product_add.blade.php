@extends('front.layout.layout')
@section('content')
<section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
    <div class="container">
        <div class="dashboard-breadcrumbs breadcrumbs"><a href="#">Home</a><a href="#">Dashboard</a><span>Main page</span></div>
        <!--Tariff Plan menu-->
        <div   class="tfp-btn"><span>Tariff Plan : </span> <strong>Extended</strong></div>
        <div class="tfp-det">
            <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
            <a href="#" class="tfp-det-btn color2-bg">Details</a>
        </div>
        <!--Tariff Plan menu end-->
        <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
            <h1>Welcome, <span>{{Auth::user()->name ?? ''}}</span></h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="dashboard-header fl-wrap">
        <div class="container">
            <div class="dashboard-header_conatiner fl-wrap">
                <div class="dashboard-header-avatar">
                    <img src="{{ asset('public/theme/front/images/avatar/4.jpg') }}" alt="">
                </div>
                <div class="dashboard-header-stats-wrap">
                    
                    <!--  dashboard-header-stats  end -->
                    <div class="dhs-controls">
                        <div class="dhs dhs-prev"><i class="fal fa-angle-left"></i></div>
                        <div class="dhs dhs-next"><i class="fal fa-angle-right"></i></div>
                    </div>
                </div>
                <!--  dashboard-header-stats-wrap end -->
                <a class="add_new-dashboard">Add Listing <i class="fal fa-layer-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
    <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
    <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
        <div class="circle_bg-bal circle_bg-bal_small"></div>
    </div>
    <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
        <div class="circle_bg-bal circle_bg-bal_big"></div>
    </div>
    <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
        <div class="circle_bg-bal circle_bg-bal_big"></div>
    </div>
    <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
        <div class="circle_bg-bal circle_bg-bal_middle"></div>
    </div>
    <div class="circle-wrap" style="right:40%;top:-10px;"  >
        <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
    </div>
    <div class="circle-wrap" style="right:55%;top:90px;"  >
        <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
    </div>
</section>
<!--  section  end-->
<!--  section  -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">
        <!--  dashboard-menu-->
       @include('front.product.sidebar')
        <!-- dashboard-menu  end-->
        <!-- dashboard content-->
        <div class="col-md-9">
            <div class="dashboard-title   fl-wrap">
                <h3>Add Listing</h3>
            </div>
            
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
            @endif

            <form action="{{ route('product.save') }}" method="post" enctype="multipart/form">
                @csrf
            
                <!-- profile-edit-container-->
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <label>Listing Title <i class="fal fa-briefcase"></i></label>
                        <input type="text" name="title" placeholder="Name of your business" value=""/>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Type / Category</label>
                                
                                <div class="listsearch-input-item">
                                    <select data-placeholder="Apartments" name="category_id" class="chosen-select no-search-select " >
                                        <option value="">All Categories</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $key }}">{{ $category }}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Keywords <i class="fal fa-key"></i></label>
                                <input type="text" name="keywords" placeholder="Maximum 15 , should be separated by commas" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- profile-edit-container end-->
                <div class="dashboard-title  dt-inbox fl-wrap">
                    <h3>Location / Contacts</h3>
                </div>
                <!-- profile-edit-container-->
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Longitude (Drag marker on the map)<i class="fal fa-long-arrow-alt-right"></i>  </label>
                                <input type="text" name= "longitude" placeholder="Map Longitude"  id="long" value=""/>
                            </div>
                            <div class="col-md-6">
                                <label>Latitude (Drag marker on the map) <i class="fal fa-long-arrow-alt-down"></i> </label>
                                <input type="text" name="latitude" placeholder="Map Latitude"  id="lat" value=""/>
                            </div>
                        </div>
                        <div class="map-container">
                            <div id="singleMap" class="drag-map" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                        </div>
                        <label>City / Location</label>
                        <div class="listsearch-input-item">
                            <select data-placeholder="City" name="city_id" class="chosen-select no-search-select" >
                                <option value="">All Cities</option>
                                @foreach ($cities as $key => $city)
                                        <option value="{{ $key }}">{{ $city }}</option>                                        
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Address<i class="fal fa-map-marker"></i></label>
                                <input type="text" name="address" placeholder="Address of your business" value=""/>
                            </div>
                            <div class="col-sm-6">
                                <label>Email Address<i class="far fa-envelope"></i>  </label>
                                <input type="text" name="email" placeholder="JessieManrty@domain.com" value=""/>
                            </div>
                            <div class="col-sm-6">
                                <label>Phone<i class="far fa-phone"></i>  </label>
                                <input type="text" name="phone" placeholder="+7(123)987654" value=""/>
                            </div>
                            <div class="col-sm-6">
                                <label> Website <i class="far fa-globe"></i>  </label>
                                <input type="text" name="website" placeholder="themeforest.net" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-title  dt-inbox fl-wrap">
                    <h3>Details</h3>
                </div>
                <!-- profile-edit-container-->
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <label>Text</label>
                        <textarea cols="40" rows="3" name="details" placeholder="Datails"></textarea>
                    </div>
                </div>
                
                <div class="dashboard-title  dt-inbox fl-wrap">
                    <h3>Your  Socials</h3>
                </div>
                <!-- profile-edit-container-->
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <div>
                            <label>Facebook <i class="fab fa-facebook"></i></label>
                            <input name="fb_link" type="text" placeholder="https://www.facebook.com/" value=""/>
                        </div>

                        <div>
                            <label>Twitter<i class="fab fa-twitter"></i>  </label>
                            <input name="twitter_link" type="text" placeholder="https://twitter.com/" value=""/>
                        </div>
                        <div>
                            <label>Instagram<i class="fab fa-instagram"></i>  </label>
                            <input name="insta_link" type="text" placeholder="https://www.instagram.com/" value=""/>
                        </div>
                        <div>
                            <label> WhatsApp <i class="fab fa-whatsapp"></i>  </label>
                            <input name="wp_link" type="text" placeholder= value="https://www.whatsapp.com/"/>
                        </div>
                        <div>
                            <label> LinkedIN <i class="fab fa-linkedin"></i>  </label>
                            <input name="linkedin_link" type="text" placeholder= value="https://www.linkedin.com/"/>
                        </div>
                        <div>
                            <label> YOUTUBE <i class="fab fa-linkedin"></i>  </label>
                            <input name="yt_link" type="text" placeholder= value="https://www.youtube.com/"/>
                        </div>
                        <div>
                            <div class="row {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <div class="col-md-12" style="margin-top:10px">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn    color2-bg  float-btn" type="submit">Send Listing<i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>

                

                <!-- profile-edit-container end-->
            </form>
        </div>

        
        <!-- dashboard content end-->
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
@endsection