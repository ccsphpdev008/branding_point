@extends('admin.auth.auth_master')
@section('content')

    <div class="m-t-100 hv-center">
        <div>
            <div class="logo">
                <span class="theme-custom-text text-center" href="javascript:void(0);">
                    <h1>
                        {{ isset($settings) && isset($settings['app_name']) ? $settings['app_name'] : getenv('APP_NAME') }}
                    </h1>
                </span>
            </div>
            <div class="card">
                <div class="body">
                    <form action="{{ route('ajax.password.forgot') }}" method="POST">
                        @csrf
                        <p class="msg text-center theme-custom-text">Enter your email here</p>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">mail</i>
                            </span>
                            <div class="form-line">
                                <input type="email" class="form-control ajax-required @error('email') is-invalid @enderror" id="email" placeholder="Enter Your E-mail" name="email" required autofocus>
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn bg-custom waves-effect" id="forgot_password" type="submit">Get Password</button>
                            </div>
                        </div>
                        <div class=" m-t-15 m-b-10 text-center">
                            <h6 class="theme-custom-text">Having Login Credentials???</h6>
                            <a href="{{ route('login') }}">Login Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
