@extends('front.layout.layout')
@section('content')

<div class="content">
    <!--  section  -->
    <section class="parallax-section single-par" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="{{ asset('public/theme/front/images/bg/5.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Our Blogs</span></h2>
                <span class="section-separator"></span>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
            </div>
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
        </div>
    </section>
    <!--  section  end-->
    <section class="gray-bg no-top-padding-sec" id="sec1">
        <div class="container">
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                <a href="#">Home</a><a href="#">Pages</a> <span>Blog</span> 
                <div  class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
            </div>
            <div class="share-holder hid-share sing-page-share top_sing-page-share">
                <div class="share-container  isShare"></div>
            </div>
            <div class="post-container fl-wrap">
                <div class="row">
                    <!-- blog content-->
                    <div class="col-md-8">
                        @foreach ($blogs as $blog)
                            <article class="post-article">
                                <div class="list-single-main-media fl-wrap">
                                    <div class="single-slider-wrap">
                                        <div class="single-slider fl-wrap">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper lightgallery">
                                                    <div class="swiper-slide hov_zoom"><img src="{{ asset($blog->image) }}" alt=""><a href="images/all/7.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                    {{-- <div class="swiper-slide hov_zoom"><img src="{{ asset($blog->image) }}" alt=""><a href="images/all/6.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                    <div class="swiper-slide hov_zoom"><img src="{{ asset($blog->image) }}" alt=""><a href="images/all/17.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-carousel_pagination">
                                            <div class="listing-carousel_pagination-wrap">
                                                <div class="ss-slider-pagination"></div>
                                            </div>
                                        </div>
                                        <div class="ss-slider-cont ss-slider-cont-prev color2-bg"><i class="fal fa-long-arrow-left"></i></div>
                                        <div class="ss-slider-cont ss-slider-cont-next color2-bg"><i class="fal fa-long-arrow-right"></i></div>
                                    </div>
                                </div>
                                <div class="list-single-main-item fl-wrap block_box">
                                    <h1>{!! $blog->title !!}</h1>
                                    <p>{!! $blog->details !!}</p>
                                    <span class="fw-separator"></span>
                                    <div class="post-author"><a href="#"><img src="{{ asset($blog->bywhom->name ?? 'public/theme/front/images/avatar/5.jpg') }}" alt=""><span>{{ $blog->bywhom->name ?? '' }}</span></a></div>
                                    <div class="post-opt">
                                        <ul class="no-list-style">
                                            <li><i class="fal fa-calendar"></i> <span>{{ \carbon\carbon::parse($blog->created_at)->format('d, M Y') }}</span></li>
                                            <li><i class="fal fa-eye"></i> <span>{{ $blog->page_view }}</span></li>
                                            <li><i class="fal fa-tags"></i> <a href="#">{{ $blog->category->name ?? '' }}</a> , <a href="#"></a> </li>
                                        </ul>
                                    </div>
                                    <a href="{{  route('blog.view', $blog->id ) }}" class="btn color2-bg  float-btn">Read more<i class="fal fa-angle-right"></i></a>
                                </div>
                            </article>
                        @endforeach
                        <div class="pagination">
                            <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
                            <a href="#">1</a>
                            <a href="#" class="current-page">2</a>
                            <a href="#">3</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
                        </div>
                    </div>
                    <!-- blog conten end-->
                    <!-- blog sidebar -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap fl-wrap fixed-bar">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Categories</h3>
                                </div>
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <ul class="cat-item no-list-style">
                                            <li><a href="#">Standard</a> <span>3</span></li>
                                            <li><a href="#">Video</a> <span>6 </span></li>
                                            <li><a href="#">Gallery</a> <span>12 </span></li>
                                            <li><a href="#">Quotes</a> <span>4</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->                                   
                        </div>
                    </div>
                    <!-- blog sidebar end -->
                </div>
            </div>
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
</div>
@endsection