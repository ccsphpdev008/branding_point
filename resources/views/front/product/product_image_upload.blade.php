@extends('front.layout.layout')
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
@endpush

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
            <h1>Welcome  : <span>Alisa Noory</span></h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="dashboard-header fl-wrap">
        <div class="container">
            <div class="dashboard-header_conatiner fl-wrap">
                <div class="dashboard-header-avatar">
                    <img src="images/avatar/4.jpg" alt="">
                    <a href="dashboard-myprofile.html" class="color-bg edit-prof_btn"><i class="fal fa-edit"></i></a>
                </div>
                <div class="dashboard-header-stats-wrap">
                    <div class="dashboard-header-stats">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-map-marked"></i>
                                        Active Listings
                                        <span>21</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-chart-bar"></i>
                                        Listing Views
                                        <span>1054</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-comments-alt"></i>
                                        Total Reviews
                                        <span>79</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                                <!--  dashboard-header-stats-item -->
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-heart"></i>
                                        Times Bookmarked
                                        <span>654</span>
                                    </div>
                                </div>
                                <!--  dashboard-header-stats-item end -->
                            </div>
                        </div>
                    </div>
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
            <!-- profile-edit-container-->
                <div class="dashboard-title  dt-inbox fl-wrap">
                    <h3>Upload Product Images</h3>
                </div>
                <div class="profile-edit-container fl-wrap block_box">
                    <div class="custom-form">
                        <div class="row">
                            <!--col -->
                            <div class="col-md-12">
                                <div class="add-list-media-wrap">
                                    <form action="{{ route('product.image.save', [$product->id]) }}" enctype="multipart/form" class='dropzone'  id='image-upload'>
                                        @csrf
                                        <div>
                                            <h3>Upload single Image By Click On Box for Background Image</h3>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-left row">
                                    <div class="col-md-3">
                                        @if($product->backgroundimage)
                                            <img src="{{ asset($product->backgroundimage) }}"  width="100%" />
                                            <a href="{{ route('product.image.remove', $product->id)}}" >
                                                <i class="fas fa-trash-0"></i>
                                                Remove
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--col end-->
                            <!--col -->
                            <div class="col-md-12 mt-5">
                                <div class="add-list-media-wrap">
                                    <form action="{{ route('product.image.carousel.save', [$product->id]) }}" enctype="multipart/form" class='dropzone'  id='image-carousel-upload'>
                                        @csrf
                                        <div>
                                            <h3>Upload Multiple Image By Click On Box for carosel</h3>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-left row mt-2">
                                    @foreach ($product->images as $image)
                                        <div class="col-md-3">
                                            <img src="{{ asset($image->url) }}" width="100%" />
                                            <a href="{{ route('product.image.carousel.remove', $image->id) }}">
                                                <i class="fas fa-trash-0"></i>
                                                Remove
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--col end-->
                            <!--col -->
                            <a class="btn    color2-bg  float-btn" href="{{route('home')}}" type="submit">Save<i class="fal fa-paper-plane"></i></a>
                            <!--col end-->
                        </div>
                    </div>
                </div>
                <!-- profile-edit-container end-->
        </div>

        
        <!-- dashboard content end-->
    </div>
</section>
<!--  section  end-->
<div class="limit-box fl-wrap"></div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

    <script>
         $("#image-upload").dropzone({
            maxFiles: 1,
            maxFilesize : 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxfilesexceeded: function(file) {
                this.removeAllFiles();
                this.addFile(file);
            }
        });
         $("#image-carousel-upload").dropzone({
            maxFilesize : 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
        });
    </script>
@endpush