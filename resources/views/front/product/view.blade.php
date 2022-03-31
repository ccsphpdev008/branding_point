@extends('front.layout.layout')
@section('content')
<div class="content">
    <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
        <div class="bg-parallax-wrap">
            <div class="bg par-elem "  data-bg="{{ asset($product->backgroundimage) }}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
        </div>
        <div class="container">
            <div class="list-single-header-item  fl-wrap">
                <div class="row">
                    <div class="col-md-9">
                        <h1>{{ $product->title }} <span class="verified-badge"><i class="fal fa-check"></i></span></h1>
                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>  {{ $product->city->name ?? '' }}</a> <a href="#"> <i class="fal fa-phone"></i>{{ $product->phone }}</a> <a href="#"><i class="fal fa-envelope"></i> {{ $product->email }}</a></div>
                    </div>
                    <div class="col-md-3">
                        @php
                            $pro_rating = count($product->reviews) == 0 ? 0 : $product->reviews->avg('point');
                        @endphp
                        <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec5">
                            <div class="listing-rating-count-wrap single-list-count">
                                <div class="review-score">{{ $pro_rating }}</div>
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $pro_rating }}"></div>
                                <br>
                                <div class="reviews-count"> Reviews- <span> {{ count($product->reviews) }} </span></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="list-single-header_bottom fl-wrap">
                
                <div class="list-single-author"> <a href="author-single.html"><span class="author_avatar"> <img alt='' src={{ asset($product->backgroundimage) }}>  </span> {{$product->keywords}}</a></div>
                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                <div class="list-single-stats">
                    <ul class="no-list-style">
                        <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  {{$product->page_view}} </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- scroll-nav-wrapper-->
    <div class="scroll-nav-wrapper fl-wrap">
        <div class="container">
            <nav class="scroll-nav scroll-init">
                <ul class="no-list-style">
                    <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Top</a></li>
                    <li><a href="#sec2"><i class="fal fa-info"></i>Details</a></li>
                    <li><a href="#sec3"><i class="fal fa-image"></i>Gallery</a></li>
                    {{-- <li><a href="#sec4"><i class="fal fa-utensils"></i>Menu</a></li> --}}
                    <li><a href="#sec5"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                </ul>
            </nav>
            <div class="scroll-nav-wrapper-opt">
                <a href="#" class="scroll-nav-wrapper-opt-btn"> <i class="fas fa-heart"></i> Save </a>
                <a href="#" class="scroll-nav-wrapper-opt-btn showshare"> <i class="fas fa-share"></i> Share </a>
                <div class="share-holder hid-share">
                    <div class="share-container  isShare"></div>
                </div>
                <div class="show-more-snopt"><i class="fal fa-ellipsis-h"></i></div>
                <div class="show-more-snopt-tooltip">
                    <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                    <a href="#"> <i class="fas fa-flag-alt"></i> Report </a>
                </div>
            </div>
        </div>
    </div>
    <!-- scroll-nav-wrapper end-->
    <section class="gray-bg no-top-padding">
        <div class="container">
            {{-- <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                <a href="#">Home</a><a href="#">Listings</a><a href="#">New York</a><span>Listing Single</span>
            </div> --}}
            <div class="clearfix"></div>
            <div class="row">
                <!-- list-single-main-wrapper-col -->
                <div class="col-md-8">
                    <!-- list-single-main-wrapper -->
                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                        <div class="list-single-main-media fl-wrap">
                            {{-- <img src="{{ asset('public/theme/front/images/all/48.jpg') }}" class="respimg" alt=""> --}}
                            <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i class="fal fa-video"></i><span>Promo Video</span></a>
                        </div>
                        <!-- list-single-main-item -->
                        <div class="list-single-main-item fl-wrap block_box">
                            <div class="list-single-main-item-title">
                                <h3>Description</h3>
                            </div>
                            <div class="list-single-main-item_content fl-wrap">
                                <p>{!! $product->details !!}</p>
                                <a href="{{ $product->website }}" target="_blank" class="btn color2-bg float-btn">Visit Website<i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <!-- list-single-main-item end -->
                        
                        <!-- list-single-main-item-->
                        <div class="list-single-main-item fl-wrap block_box" id="sec3">
                            <div class="list-single-main-item-title">
                                <h3>Gallery / Photos</h3>
                            </div>
                            <div class="list-single-main-item_content fl-wrap">
                                <div class="single-carousel-wrap fl-wrap lightgallery">
                                    <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                    <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                    <div class="single-carousel fl-wrap full-height">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <!-- swiper-slide-->
                                                @foreach ($product->images as $image)
                                                    <div class="swiper-slide">
                                                        <div class="box-item">
                                                            <img src="{{ asset($image->url) }}" alt="{{ $product->title }}">
                                                            <a href="{{ asset($image->url) }}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <!-- swiper-slide end-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- list-single-main-item end -->
                        <!-- list-single-facts -->
                        <div class="list-single-facts fl-wrap">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- inline-facts -->
                                    <div class="inline-facts-wrap gradient-bg ">
                                        <div class="inline-facts">
                                            <i class="fal fa-smile-plus"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="245">0</div>
                                                </div>
                                            </div>
                                            <h6>New Visiters Every Week</h6>
                                        </div>
                                        <div class="stat-wave">
                                            <svg viewbox="0 0 100 25">
                                                <path fill="#fff" d="M0 30 V12 Q30 17 55 2 T100 11 V30z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap gradient-bg ">
                                        <div class="inline-facts">
                                            <i class="fal fa-users"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="2557">0</div>
                                                </div>
                                            </div>
                                            <h6>Happy customers every year</h6>
                                        </div>
                                        <div class="stat-wave">
                                            <svg viewbox="0 0 100 25">
                                                <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap gradient-bg ">
                                        <div class="inline-facts">
                                            <i class="fal fa-award"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="25">0</div>
                                                </div>
                                            </div>
                                            <h6>Won Awards</h6>
                                        </div>
                                        <div class="stat-wave">
                                            <svg viewbox="0 0 100 25">
                                                <path fill="#fff" d="M0 30 V12 Q30 12 55 5 T100 11 V30z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                            </div>
                        </div>
                        <!-- list-single-facts end -->
                       
                        <!-- list-single-main-item -->
                        <div class="list-single-main-item fl-wrap block_box" id="sec5">
                            <div class="list-single-main-item-title">
                                <h3>Reviews -  <span> {{ count($product->reviews) }} </span></h3>
                            </div>
                            <!--reviews-score-wrap-->
                            @php
                                $pro_rating = round(count($product->reviews) == 0 ? 0 : $product->reviews->avg('point'), 2);
                            @endphp
                            <div class="reviews-score-wrap fl-wrap">
                                <div class="review-score-total">
                                    <span class="review-score-total-item">
                                    {{ $pro_rating }}
                                    </span>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $pro_rating }}"></div>
                                </div>
                                <div class="review-score-detail">
                                    <!-- review-score-detail-list-->
                                    <div class="review-score-detail-list">
                                        <!-- rate item-->
                                        <div class="rate-item">
                                            <div class="rate-item-title"><span>&nbsp;</span></div>
                                            <div class="rate-item-bg" data-percent="{{ ($pro_rating / 5) * 100 }}%">
                                                <div class="rate-item-line gradient-bg"></div>
                                            </div>
                                            <div class="rate-item-percent">{{ $pro_rating }}</div>
                                        </div>
                                        <!-- rate item end-->
                                    </div>
                                    <!-- review-score-detail-list end-->
                                </div>
                            </div>
                            <!-- reviews-score-wrap end -->
                            <div class="list-single-main-item_content fl-wrap">
                                <div class="reviews-comments-wrap">
                                    @foreach ($product->reviews as $review)
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="{{ asset('public/theme/front/images/avatar/4.jpg') }}" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text fl-wrap">
                                                <div class="reviews-comments-header fl-wrap">
                                                    <h4><a href="#">{{ $review->name }}</a></h4>
                                                    <div class="review-score-user">
                                                        <span class="review-score-user_item">{{ $review->point }}</span>
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $review->point }}"></div>
                                                    </div>
                                                </div>
                                                <p>{{ $review->review }}</p>
                                                <div class="reviews-comments-item-footer fl-wrap">
                                                    <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>{{ \carbon\carbon::parse($review->created_at)->format('d, M Y') }}</span></div>
                                                    {{-- <a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a> --}}
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
                                <h3>Add Review</h3>
                            </div>
                            <!-- Add Review Box -->
                            <div id="add-review" class="add-review-box">
                                <!-- Review Comment -->
                                <form action="{{ route('product.review', [$product->id]) }}" method="post" enctype="multipart/form" id="add-comment" class="add-comment  custom-form" name="rangeCalc" >
                                    @csrf
                                    <fieldset>
                                        <div class="review-score-form fl-wrap">
                                            <div class="review-range-container">
                                                <!-- review-range-item-->
                                                <div class="review-range-item">
                                                    <div class="range-slider-title">Rating</div>
                                                    <div class="range-slider-wrap ">
                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="4">
                                                    </div>
                                                </div>
                                                <!-- review-range-item end -->
                                               
                                            </div>
                                            <div class="review-total">
                                                <span><input type="text" name="point" data-form="AVG({rgcl})" value="0"></span>
                                                <strong>Your Score</strong>
                                            </div>
                                        </div>
                                        <div class="list-single-main-item_content fl-wrap">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input type="text" name="name" placeholder="Your Name *" value=""/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label><i class="fal fa-envelope"></i>  </label>
                                                    <input type="text" name="email" placeholder="Email Address*" value=""/>
                                                </div>
                                            </div>
                                            <textarea cols="40" rows="3" name="review" placeholder="Your Review:"></textarea>
                                            <div class="clearfix"></div>

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
                    
                                            <button class="btn  color2-bg  float-btn">Submit Review <i class="fal fa-paper-plane"></i></button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- Add Review Box / End -->
                        </div>
                        <!-- list-single-main-item end -->
                    </div>
                </div>
                <!-- list-single-main-wrapper-col end -->
                <!-- list-single-sidebar -->
                <div class="col-md-4">
                  
                   
                    <!--box-widget-item -->
                    <div class="box-widget-item fl-wrap block_box">
                        <div class="box-widget-item-header">
                            <h3>Location / Contacts  </h3>
                        </div>
                        <div class="box-widget">
                            <div class="map-container">
                                <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
                            </div>
                            <div class="box-widget-content bwc-nopad">
                                <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                    <ul class="no-list-style">
                                        <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a href="#">{{$product->address}}</a></li>
                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">{{$product->phone}}</a></li>
                                        <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#"></a>{{$product->email}}</li>
                                        <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#"></a>{{$product->website}}</li>
                                    </ul>
                                </div>
                                <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                    <ul class="no-list-style">
                                        <li><a href="#" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fab fa-vk"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                    <div class="bottom-bcw-box_link"><a href="#" class="show-single-contactform tolt" data-microtip-position="top" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--box-widget-item end -->
                   
                    <!--box-widget-item -->
                    
                    <!--box-widget-item end -->
                </div>
                <!-- list-single-sidebar end -->
            </div>
        </div>
    </section>
    <div class="limit-box fl-wrap"></div>
</div>
@endsection