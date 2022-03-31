@extends('front.layout.layout')
@section('content')
<section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
    <div class="container">
        <div class="dashboard-breadcrumbs breadcrumbs"><a href="#">Home</a><a href="#">Dashboard</a><span>Main page</span></div>
        <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
            <h1>Welcome  : <span>{{Auth::user()->name ?? ''}}</span></h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="dashboard-header fl-wrap">
        <div class="container">
            <div class="dashboard-header_conatiner fl-wrap">
                <div class="dashboard-header-avatar">
                    @if (!empty(Auth::user()->image))
                    <img src="{{ URL(Auth::user()->image) }}" alt="">
                    @else
                        <img src="{{ asset('public/theme/front/images/avatar/4.jpg') }}" alt="">
                    @endif
                </div>
                
                <!--  dashboard-header-stats-wrap end -->
                <a class="add_new-dashboard"> </a>
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
                <h3>Edit Profile</h3>
            </div>
            
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
            @endif

            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
            
                <!-- profile-edit-container-->
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <label>User name<i class="fal fa-briefcase"></i></label>
                        <div>
                            <input type="text" name="name" placeholder="Name " value="{{ $user->name }}"/>
                       </div>
                       <div class="text-left mt=1">
                           <label for="password" > <input type="checkbox" name="is_password"/> &nbsp;Is Password Change?</label>
                        </div> 
                        <div>
                            <input type="text" name="password" placeholder="Password" value=""/>
                        </div>
                        <div>
                            <label>Image upload</label>
                            <input type="file" name="image">
                        </div>
                        <button type="submit">Update<i class="fal fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <!-- dashboard content end-->
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>
@endsection