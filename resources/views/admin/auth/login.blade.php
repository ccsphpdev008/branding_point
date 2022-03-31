@extends('admin.auth.auth_master')
@push('meta')
    <meta name="description" content="{{ isset($settings) && isset($settings['home_description']) ? $settings['home_description'] : '' }}" />
    <meta name="keywords" content="{{ isset($settings) && isset($settings['home_keywords']) ? $settings['home_keywords'] : '' }}" />
@endpush

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

    <div class="container">
        <div class="row clearfix m-t-20 text-center" style="height: 420px;">
            <div class="text-center col-sm-12 col-md-6">
                <img src="{{ isset($settings) && isset($settings['app_logo']) ? asset($settings['app_logo']) : '' }}" style="width: 100%; height: auto;margin-top: 120px" />
            </div>
            <div class="text-center col-sm-12 col-md-6">
                <div class="card m-t-90">
                    <div class="body">
                        <form action="{{ route('login.check') }}" method="POST">
                            @csrf
                            <p class="msg theme-custom-text text-center">Sign in to start your session</p>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">mail</i>
                                </span>
                                <div class="form-line">
                                    <input type="email" class="form-control ajax-required @error('email') is-invalid @enderror" id="email" placeholder="Enter Your E-mail" name="email" required autofocus>
                                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control ajax-required @error('password') is-invalid @enderror" id="password" placeholder="Enter Your Password" name="password" required>
                                    @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-5">
                                    <button class="btn btn-block bg-custom waves-effect" type="submit">SIGN IN</button>
                                </div>
                                <div class="col-xs-7 text-right">
                                    <a href="{{ route('forgot') }}">Forgot Password</a>
                                </div>
                            </div>
                            <div class="row m-t-5 m-b-10 text-center">
                                <h6 class="theme-custom-text">Join with Us <u><a href="{{ route('contact') }}">Here</a></u></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-12 col-md-12 col-lg-12 card m-t-20">
            <div class="owl-carousel owl-theme card-body" style="height: 400px; width : 100%;">
                @foreach($brand_image as $key => $data)
                    <img src="{{ asset($data) }}" alt="BannerImage" class="banner-image" style="padding: 10px; height: 400px">
                @endforeach
            </div>
        </div> --}}
    </div>

@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            localStorage.removeItem('ajax-load-url');
            localStorage.removeItem('ajax-load-type');

            $('.owl-carousel').owlCarousel({
                items: 1,
                nav: true,
                dots: true,
                autoplay: true,
                loop: true,
                mouseDrag: true,
                autoplayTimeout:3000,
                touchDrag: false,
            });
        });
    </script>
@endpush
