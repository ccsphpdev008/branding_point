<section>
    <div class="container big-container">
        <div class="section-title">
            <h2><span>Most Popular Palces</span></h2>
            <div class="section-subtitle">Best Listings</div>
            <span class="section-separator"></span>
            <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
        </div>
        <div class="listing-filters gallery-filters fl-wrap">
            <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*">All Categories</a>
            @foreach ($categories as $key => $category)
                <a href="#" class="gallery-filter" data-filter=".cat-{{ $key }}">{{ $category }}</a>
            @endforeach
        </div>
        <div class="grid-item-holder gallery-items fl-wrap">
            @foreach ($mostpopular as $product)
                <div class="gallery-item cat-{{ $product->category_id }}">
                    <!-- listing-item  -->
                    <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            @php
                                $pro_rating = round(count($product->reviews) == 0 ? 0 : $product->reviews->avg('point'), 2);
                            @endphp
                            <div class="geodir-category-img">
                                <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                    <a href="{{ route('product.view', $product->id)}}" class="geodir-category-img-wrap fl-wrap">
                                        <img src="{{ asset($product->backgroundimage) }}" alt="{{ $product->title }}" style="height:250px"> 
                                    </a>
                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset($product->user->image ?? 'public/theme/front/images/avatar/1.jpg') }}" alt=""></a>
                                    <span class="avatar-tooltip">Added By  <strong>{{ $product->user->name }}</strong></span>
                                </div>
                                <div class="geodir_status_date gsd_open " >
                                    <a href="{{ route('product.edit', $product->id)}}" class="geodir-category-img-wrap fl-wrap text-white">
                                    <i class="fal fa-pencil " ></i>
                                    Edit
                                    </a>
                                </div>
                                <div class="geodir-category-opt">
                                    <div class="listing-rating-count-wrap">
                                        <div class="review-score">{{ $pro_rating }}</div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $pro_rating }}"></div>
                                        <br>
                                        <div class="reviews-count">{{ count($product->reviews) }} Reviews</div>
                                    </div>
                                </div>
                            </div>
                            <div class="geodir-category-content fl-wrap title-sin_item">
                                <div class="geodir-category-content-title fl-wrap">
                                    <div class="geodir-category-content-title-item">
                                        <h3 class="title-sin_map"><a href="{{ route('product.view', $product->id)}}">{{ $product->title }}</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                        <div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-map-marker-alt"></i> {{$product->address}}</a></div>
                                    </div>
                                </div>
                                <div class="geodir-category-text fl-wrap">
                                    <p class="small-text">{{$product->details}}</p>
                                </div>
                                <div class="geodir-category-footer fl-wrap">
                                    <a class="listing-item-category-wrap">
                                        <div class="listing-item-category red-bg"><i class="fal fa-cheeseburger"></i></div>
                                        <span>{{$product->category->name ?? '' }}</span>
                                    </a>
                                    <div class="geodir-opt-list">
                                        <ul class="no-list-style">
                                            <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span class="geodir-opt-tooltip">Contact Info</span></a></li>
                                            <li><a href="#1" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                                            <li>
                                                <div class="dynamic-gal gdop-list-link" data-dynamicPath="[{'src': '{{ asset('public/theme/front/images/all/1.jpg') }}'},{'src': '{{ asset('public/theme/front/images/all/24.jpg') }}'}, {'src': '{{ asset('public/theme/front/images/all/12.jpg') }}'}]"><i class="fal fa-search-plus"></i><span class="geodir-opt-tooltip">Gallery</span></div>
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
                    <!-- listing-item end -->                              
                </div>
            @endforeach
        </div>
        <a href="{{ route('product.list') }}" class="btn  dec_btn  color2-bg">Check Out All Listings<i class="fal fa-arrow-alt-right"></i></a>
    </div>
</section>
