@extends('front.layout.layout')
@section('content')
<section class="parallax-section single-par" data-scrollax-parent="true">
    <div class="bg par-elem "  data-bg="{{ asset ('public/theme/front/images/bg/35.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay op7"></div>
    <div class="container">
        <div class="section-title center-align big-title">
            <h2><span>Product Listing</span></h2>
            <span class="section-separator"></span>
            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Products</a><span>Product Listings </span></div>
        </div>
    </div>
    <div class="header-sec-link">
        <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
    </div>
</section>
<!--  section  end-->
<section class="gray-bg small-padding no-top-padding-sec" id="sec1">
    <div class="container">
        <!-- list-main-wrap-header-->
        <div class="list-main-wrap-header fl-wrap   block_box no-vis-shadow no-bg-header fixed-listing-header">
            <!-- list-main-wrap-title-->
            {{-- <div class="list-main-wrap-title">
                <h2>Results For : <span>New York </span></h2>
            </div>
            <!-- list-main-wrap-title end--> --}}
            <!-- list-main-wrap-opt-->
            {{-- <div class="list-main-wrap-opt">
                <!-- price-opt-->
                <div class="price-opt">
                    <span class="price-opt-title">Sort   by:</span>
                    <div class="listsearch-input-item">
                        <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                            <option>Popularity</option>
                            <option>Average rating</option>
                            <option>Price: low to high</option>
                            <option>Price: high to low</option>
                        </select>
                    </div>
                </div>
                <!-- price-opt end-->
                <!-- price-opt-->
                <div class="grid-opt">
                    <ul class="no-list-style">
                        <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="fal fa-th"></i></span></li>
                        <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="fal fa-list"></i></span></li>
                    </ul>
                </div>
                <!-- price-opt end-->
            </div> --}}
            <!-- list-main-wrap-opt end-->                    
            <a class="custom-scroll-link back-to-filters clbtg" href="#lisfw"><i class="fal fa-search"></i></a>
        </div>
        <!-- list-main-wrap-header end-->                      
        <div class="mob-nav-content-btn  color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>  Filters</div>
        <div class="fl-wrap">
            <!-- listsearch-input-wrap-->
            <div class="listsearch-input-wrap lws_mobile fl-wrap tabs-act inline-lsiw" id="lisfw">
                <div class="listsearch-input-wrap_contrl fl-wrap">
                    {{-- <ul class="tabs-menu fl-wrap no-list-style">
                        <li class="current"><a href="#filters-search"> <i class="fal fa-sliders-h"></i> Filters </a></li>
                        <li><a href="#category-search"> <i class="fal fa-image"></i>Categories </a></li>
                    </ul> --}}
                </div>
                <!--tabs -->                       
                <div class="tabs-container fl-wrap">
                    <!--tab --> 
                    <div class="tab">
                        <div id="category-search" class="tab-content">
                            <!-- category-carousel-wrap -->  
                            <div class="category-carousel-wrap fl-wrap">
                                <div class="category-carousel fl-wrap full-height">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!-- category-carousel-item -->  
                                            <div class="swiper-slide">
                                                <a class="category-carousel-item fl-wrap full-height checket-cat" href="#">
                                                    <img src="{{ asset('public/theme/front/images/all/12.jpg') }}" alt="">
                                                    <div class="category-carousel-item-icon red-bg"><i class="fal fa-cheeseburger"></i></div>
                                                    <div class="category-carousel-item-container">
                                                        <div class="category-carousel-item-title">Restaurants / Cafe</div>
                                                        <div class="category-carousel-item-counter">6 listings</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- category-carousel-item end -->  
                                            <!-- category-carousel-item -->  
                                            <div class="swiper-slide">
                                                <a class="category-carousel-item fl-wrap full-height" href="#">
                                                    <img src="{{ asset('public/theme/front/images/all/34.jpg') }}" alt=""> 
                                                    <div class="category-carousel-item-icon yellow-bg"><i class="fal fa-bed"></i></div>
                                                    <div class="category-carousel-item-container">
                                                        <div class="category-carousel-item-title">Hotel / Hostel</div>
                                                        <div class="category-carousel-item-counter">14 listings</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- category-carousel-item end --> 
                                            <!-- category-carousel-item -->  
                                            <div class="swiper-slide">
                                                <a class="category-carousel-item fl-wrap full-height" href="#">
                                                    <img src="{{ asset('public/theme/front/images/all/33.jpg') }}" alt=""> 
                                                    <div class="category-carousel-item-icon purp-bg"><i class="fal fa-cocktail"></i></div>
                                                    <div class="category-carousel-item-container">
                                                        <div class="category-carousel-item-title">Events / Nightlife</div>
                                                        <div class="category-carousel-item-counter">6 listings</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- category-carousel-item end --> 
                                            <!-- category-carousel-item -->  
                                            <div class="swiper-slide">
                                                <a class="category-carousel-item fl-wrap full-height" href="#">
                                                    <img src="{{ asset('public/theme/front/images/all/10.jpg') }}" alt=""> 
                                                    <div class="category-carousel-item-icon blue-bg"><i class="fal fa-dumbbell"></i></div>
                                                    <div class="category-carousel-item-container">
                                                        <div class="category-carousel-item-title">Fitness / Gym</div>
                                                        <div class="category-carousel-item-counter">18 listings</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- category-carousel-item end -->
                                            <!-- category-carousel-item -->  
                                            <div class="swiper-slide">
                                                <a class="category-carousel-item fl-wrap full-height" href="#">
                                                    <img src="{{ asset('public/theme/front/images/all/11.jpg') }}" alt=""> 
                                                    <div class="category-carousel-item-icon green-bg"><i class="fal fa-cart-arrow-down"></i></div>
                                                    <div class="category-carousel-item-container">
                                                        <div class="category-carousel-item-title">Shopping</div>
                                                        <div class="category-carousel-item-counter">19 listings</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- category-carousel-item end -->  
                                        </div>
                                    </div>
                                </div>
                                <!-- category-carousel-wrap end-->  
                            </div>
                            <div class="catcar-scrollbar fl-wrap">
                                <div class="hs_init"></div>
                                <div class="cc-contorl">
                                    <div class="cc-contrl-item cc-prev"><i class="fal fa-angle-left"></i></div>
                                    <div class="cc-contrl-item cc-next"><i class="fal fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab end-->
                </div>
                <!--tabs end-->
            </div>
            <!-- listsearch-input-wrap end-->                                
            <!-- listing-item-container -->
            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic three-columns-grid">
                <!-- listing-item  -->
                @foreach($products as $product)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        @php
                             $pro_rating = round(count($product->reviews) == 0 ? 0 : $product->reviews->avg('point'), 2);
                        @endphp
                        <div class="geodir-category-img">
                            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                            <a href="{{ route('product.view', $product->id) }}" class="geodir-category-img-wrap fl-wrap">
                            <img src="{{ asset($product->backgroundimage) }}" alt="" style="height:250px"> 
                            </a>
                            <div class="listing-avatar"><a href="{{ route('product.view', $product->id)}}"><img src="{{ asset($product->backgroundimage) }}" alt=""></a>
                                <span class="avatar-tooltip">Added By  <strong>{{ $product->user->name }}</strong></span>
                            </div>
                            <div class="geodir_status_date gsd_open"><a href="{{ route('product.edit', $product->id) }}"><i class="fal fa-pencil"></i>Edit</a></div>
                           
                            <div class="geodir-category-opt">
                                <div class="listing-rating-count-wrap">
                                    <div class="review-score">{{ $pro_rating }}</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $pro_rating }}"></div>
                                    <br>
                                    <div class="reviews-count"><span> {{ count($product->reviews) }} Reviews</span>
                                        <div class="list-single-stats">
                                            <ul class="no-list-style">
                                                <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  {{$product->page_view}} </span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="geodir-category-content fl-wrap title-sin_item">
                            <div class="geodir-category-content-title fl-wrap">
                                <div class="geodir-category-content-title-item">
                                    <h3 class="title-sin_map"><a href="{{ route('product.view',$product->id ) }}">{{ $product->title }}</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                    <div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-map-marker-alt"></i> {{ $product->address}}</a></div>
                                </div>
                            </div>
                            <div class="geodir-category-text fl-wrap">
                                <p class="small-text">{{ $product->details}}</p>
                            </div>
                            <div class="geodir-category-footer fl-wrap">
                                <a class="listing-item-category-wrap">
                                    <div class="listing-item-category red-bg"><i class="fal fa-cheeseburger"></i></div>
                                    <span>Restaurants</span>
                                </a>
                                <div class="geodir-opt-list">
                                    <ul class="no-list-style">
                                        <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                        <li><a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                                        <li>
                                            <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': 'images/all/1.jpg'},{'src': 'images/all/24.jpg'}, {'src': 'images/all/12.jpg'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="price-level geodir-category_price">
                                    <span class="price-level-item" data-pricerating="1"></span>
                                    <span class="price-name-tooltip">Pricey</span>
                                </div>
                                <div class="geodir-category_contacts">
                                    <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                    <ul class="no-list-style">
                                        <li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li>
                                        <li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                    </article>
                </div>
                @endforeach
                <div class="pagination fwmpag">
                    <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
                    <a href="#">1</a>
                    <a href="#" class="current-page">2</a>
                    <a href="#">3</a>
                    <a href="#">...</a>
                    <a href="#">7</a>
                    <a href="#" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
                </div>
            </div>
            <!-- listing-item-container end -->
        </div>
    </div>
</section>
@endsection