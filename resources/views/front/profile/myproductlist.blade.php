@extends('front.layout.layout')
@section('content')

<div class="listing-item-container init-grid-items fl-wrap nocolumn-lic three-columns-grid">
    <div class="container">
        @include('front.product.sidebar')
        <!-- listing-item  -->
        <div class="col-md-9">
            @foreach($products as $product)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        @php
                             $pro_rating = round(count($product->reviews) == 0 ? 0 : $product->reviews->avg('point'), 2);
                        @endphp
                        <div class="geodir-category-img">
                            <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                            <a href="{{ route('product.view', $product->id) }}" class="geodir-category-img-wrap fl-wrap">
                            <img src="{{ asset($product->backgroundimage) }}" alt="" style="height: 200px"> 
                            </a>
                            <div class="listing-avatar"><a href="{{ route('product.view', $product->id)}}"><img src="{{ asset($product->backgroundimage) }}" alt=""></a>
                                <span class="avatar-tooltip">Added By  <strong>{{ $product->title }}</strong></span>
                            </div>
                            <div class="geodir_status_date">
                                <a href="{{route('product.edit',$product->id)}}" title="Edit" class="green-bg text-white text-center"><i class="p-2 m-0 fal fa-pencil"></i></a>
                                <a href="{{route('product.delete',$product->id)}}" title="Delete" class="red-bg text-white text-center"><i class="p-2 m-0 fal fa-trash"></i></a>
                            </div>
                            <div class="geodir-category-opt">
                                <div class="listing-rating-count-wrap">
                                    <div class="review-score">{{ $pro_rating }}</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $pro_rating }}"></div>
                                    <br>
                                    <div class="reviews-count">{{ count($product->reviews) }} reviews</div>
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
                                <div class="facilities-list fl-wrap">
                                    <div class="facilities-list-title">Facilities : </div>
                                    <ul class="no-list-style">
                                        <li class="tolt"  data-microtip-position="top" data-tooltip="Free WiFi"><i class="fal fa-wifi"></i></li>
                                        <li class="tolt"  data-microtip-position="top" data-tooltip="Parking"><i class="fal fa-parking"></i></li>
                                        <li class="tolt"  data-microtip-position="top" data-tooltip="Non-smoking Rooms"><i class="fal fa-smoking-ban"></i></li>
                                        <li class="tolt"  data-microtip-position="top" data-tooltip="Pets Friendly"><i class="fal fa-dog-leashed"></i></li>
                                    </ul>
                                </div>
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
                                    <span class="price-level-item" data-pricerating="3"></span>
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
    </div>
</div>

@endsection