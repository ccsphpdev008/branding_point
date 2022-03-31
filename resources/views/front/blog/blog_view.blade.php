@extends('front.layout.layout')
@section('content')
<div class="content">
    <section class="gray-bg no-top-padding-sec" id="sec1">
        <div class="container">
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                <a href="#">Home</a><a href="#">Blog</a> <span>Blog Single</span> 
                <div  class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div>
            </div>
            <div class="share-holder hid-share sing-page-share top_sing-page-share">
                <div class="share-container  isShare"></div>
            </div>
            <div class="post-container fl-wrap">
                <div class="row">
                    <!-- blog content-->
                    <div class="col-md-8">
                        <!-- article> --> 
                        <article class="post-article single-post-article">
                            <div class="list-single-main-media fl-wrap">
                                <div class="single-slider-wrap">
                                    <div class="single-slider fl-wrap">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper lightgallery">
                                                <div class="swiper-slide hov_zoom"><img src="{{ asset($blog->image) }}" alt=""><a href="images/all/7.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
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
                                <h2 class="post-opt-title"><a href="{{  route('blog.view', $blog->id ) }} ">Here’s What People Are Saying About Us.</a></h2>
                                <div class="post-author"><a href="#"><img src="{{ asset($blog->image) }}" alt=""><span>{{ $blog->title }}</span></a></div>
                                <div class="post-opt">
                                    <ul class="no-list-style">
                                        <li><i class="fal fa-calendar"></i> <span>25 April 2018</span></li>
                                        <li><i class="fal fa-eye"></i> <span>{{ $blog->page_view}}</span></li>
                                        <li><i class="fal fa-tags"></i> <a href="#">{{ $blog->category->name ?? '' }}</a>  <a href="#"></a> </li>
                                    </ul>
                                </div>
                                <span class="fw-separator"></span> 
                                <div class="clearfix"></div>
                                <p>{{ $blog->details }}</p>
                                {{-- <span class="fw-separator"></span>  --}}
                                {{-- <div class="list-single-tags tags-stylwrap">
                                    <span class="tags-title"><i class="fas fa-tag"></i> Tags : </span>
                                    <a href="#">Hotel</a>
                                    <a href="#">Hostel</a>
                                    <a href="#">Room</a>
                                    <a href="#">Spa</a>
                                    <a href="#">Restourant</a>
                                    <a href="#">Parking</a>                                                     
                                </div> --}}
                            </div>
                        </article>
                        <!-- article end --> 
                        <!-- post nav --> 
                        {{-- <div class="post-nav-wrap fl-wrap">
                            <a class="post-nav post-nav-prev" href="{{  route('blog.view', $blog->id)}}"><span class="post-nav-img"><img src="{{ asset ('public/theme/front/images/all/7.jpg') }}" alt=""></span><span class="post-nav-text"><strong>Prev Post</strong> <br>How to choose the right store</span></a> 
                            <a class="post-nav post-nav-next" href="{{  route('blog.view', $blog->id)}}"><span class="post-nav-img"><img src="{{ asset ('public/theme/front/images/all/4.jpg') }}" alt=""></span><span class="post-nav-text"><strong>Next Post</strong><br>Best Hotel to Your Family</span></a> 
                        </div> --}}
                        <!-- post nav end --> 
                        <!-- list-single-main-item -->   
                        <div class="list-single-main-item fl-wrap block_box">
                            <div class="list-single-main-item-title">
                                <h3>Post Comments -  <span> {{count($blog->reviews)}} </span></h3>
                            </div>
                            <div class="list-single-main-item_content fl-wrap">
                                <div class="reviews-comments-wrap">
                                    <!-- reviews-comments-item -->  
                                    @foreach ($blog->reviews as $review)
                                    <div class="reviews-comments-item only-comments">
                                        <div class="review-comments-avatar">
                                            <img src="{{ asset('public/theme/front/images/avatar/4.jpg') }}" alt=""> 
                                        </div>
                                        <div class="reviews-comments-item-text fl-wrap">
                                            <div class="reviews-comments-header fl-wrap">
                                                <h4><a href="#">{{ $review->name }}</a></h4>
                                            </div>
                                            <p>{{ $review->comment }}</p>
                                            <div class="reviews-comments-item-footer fl-wrap">
                                                <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>{{ \carbon\carbon::parse($review->created_at)->format('d, M Y') }}</span></div>
                                                {{-- <a href="#" class="reply-item">Reply</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                  
                                </div>
                            </div>
                        </div>
                        <!-- list-single-main-item end -->                                       
                        <!-- list-single-main-item -->   
                        <div class="list-single-main-item fl-wrap block_box" id="sec6">
                            <div class="list-single-main-item-title fl-wrap">
                                <h3>Add Comment</h3>
                            </div>
                            <!-- Add Review Box -->
                            <div id="add-review" class="add-review-box">
                                <!-- Review Comment -->
                                <form action="{{ route('blog.review',[$blog->id]) }}" method="post" id="add-comment" class="add-comment  custom-form" name="rangeCalc" >
                                    @csrf
                                    <fieldset>
                                        <div class="list-single-main-item_content fl-wrap">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input type="text" name="name" placeholder="Your Name *" value="" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label><i class="fal fa-envelope"></i>  </label>
                                                    <input type="email" name="email" placeholder="Email Address*" value="" required/>
                                                </div>
                                            </div>
                                            <textarea cols="40" rows="3" name="comment" placeholder="Your comment:" required></textarea>
                                            <div class="clearfix"></div>
                                            <button class="btn  color2-bg  float-btn" style="margin-top:30px;">Submit Comment <i class="fal fa-paper-plane"></i></button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- Add Review Box / End -->
                        </div>
                        <!-- list-single-main-item end -->                                               
                    </div>
                    <!-- blog conten end-->
                    <!-- blog sidebar -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap fl-wrap fixed-bar">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Popular Categories</h3>
                                </div>
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <ul class="cat-item no-list-style">
                                            @foreach ($categories as $key => $category)
                                                <li><a href="#">{{ $category }}</a> </li>
                                            @endforeach
                                           
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