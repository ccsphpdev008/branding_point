<!--Hero slider-->
<div class="hero-slider_wrap fl-wrap">
    <div class="hero-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!--hero-slider-item-->
                @foreach($banners as $banner)
                 <div class="swiper-slide">
                    <div class="hero-slider-item fl-wrap">
                        <div class="bg-tabs-wrap">
                            <div class="bg"  data-bg="{{ asset($banner->url) }}"></div>
                            <div class="overlay op7"></div>
                        </div>
                        <div class="container small-container">
                            <div class="intro-item fl-wrap">
                                <span class="section-separator"></span>
                                <div class="bubbles">
                                    <h1>{!! $banner->title !!}</h1>
                                </div>
                                <h3>{!! $banner->subtitle !!}</h3>
                            </div>
                            {{-- <div class="hero-search  fl-wrap">
                                <div class="main-search-input-wrap fl-wrap">
                                    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                            <label><i class="fal fa-keyboard"></i></label>
                                            <input type="text" placeholder="What are you looking for?" value=""/>
                                        </div>
                                         <div class="main-search-input-item location autocomplete-container">
                                            <label><i class="fal fa-map-marker-check"></i></label>
                                            <input type="text" placeholder="Location" class="autocomplete-input" id="autocompleteid" value=""/>
                                            <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                                        </div> 
                                        <div class="main-search-input-item">
                                            <select data-placeholder="Location"  class="chosen-select no-search-select" >
                                                <option>Location</option>
                                                    @foreach ($cities as $key => $city)
                                                        <option value="{{ $key }}">{{ $city }}</option>                                        
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="main-search-input-item">
                                            <select data-placeholder="All Categories"  class="chosen-select no-search-select" >
                                                <option>All Categories</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $key }}">{{ $category }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <button class="main-search-button color2-bg" onclick="window.location.href='listing.html'">Search <i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <div class="listing-carousel_pagination hero_pagination">
        <div class="listing-carousel_pagination-wrap"></div>
    </div>
    <div class="slider-hero-button-prev shb color2-bg"><i class="fas fa-caret-left"></i></div>
    <div class="slider-hero-button-next shb color2-bg"><i class="fas fa-caret-right"></i></div>
</div>
<!--Hero slider end-->
