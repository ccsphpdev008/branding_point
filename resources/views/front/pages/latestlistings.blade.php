<section class="slw-sec" id="sec1">
    <div class="section-title">
        <h2>The Latest Listings</h2>
        <div class="section-subtitle">Newest  Listings</div>
        <span class="section-separator"></span>
        <p>Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum.</p>
    </div>
    <div class="listing-slider-wrap fl-wrap">
        <div class="listing-slider fl-wrap">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <div class="listing-slider-item fl-wrap">
                                <!-- listing-item  -->
                                <div class="listing-item listing_carditem">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img">
                                            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                            <a href="{{ route('product.view', $product->id)}}" class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ asset($product->backgroundimage) }}" alt="{{ $product->title }}" loading="lazy" style="height: 300px">
                                            </a>
                                            <div class="geodir_status_date gsd_open">
                                                <a href="{{ route('product.edit', $product->id)}}" class="geodir-category-img-wrap fl-wrap" style="color:white">
                                                    <i class="fal fa-pencil"></i>
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="geodir-category-opt">
                                                @php
                                                    $pro_rating = round(count($product->reviews) == 0 ? 0 : $product->reviews->avg('point'), 2);
                                                @endphp
                                                <div class="geodir-category-opt_title">
                                                    <h4><a href="{{ route('product.view', $product->id)}}">{{ $product->title }}</a></h4>
                                                    <div class="geodir-category-location">
                                                        <a href="#"><i class="fas fa-map-marker-alt"></i> {{ $product->city->name ?? '' }}</a>
                                                    </div>
                                                </div>
                                                <div class="listing-rating-count-wrap">
                                                    <div class="review-score">{{ $pro_rating }}</div>
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $pro_rating }}"></div>
                                                    <br>
                                                    <div class="reviews-count">{{ count($product->reviews) }} reviews</div>
                                                </div>
                                                <div class="list-single-stats">
                                                    <ul class="no-list-style">
                                                        <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  {{$product->page_view}} </span></li>
                                                    </ul>
                                                </div>
                                                <div class="listing_carditem_footer fl-wrap">
                                                    <a class="listing-item-category-wrap" href="#">
                                                        <div class="listing-item-category red-bg"><i class="fal fa-cheeseburger"></i></div>
                                                        <span>{{$product->category->name ?? ''}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!-- listing-item end -->                                                   
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
        </div>
        <div class="tc-pagination_wrap">
            <div class="tc-pagination2"></div>
        </div>
    </div>
</section>