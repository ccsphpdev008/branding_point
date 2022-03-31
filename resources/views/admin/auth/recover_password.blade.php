@extends('admin.auth.auth_master')
@section('content')

    <div class="m-t-100 hv-center">
        <div>
            <div class="logo">
                <span class="theme-custom-text" href="javascript:void(0);"><h1>{{ isset($settings) && isset($settings['app_name']) ? $settings['app_name'] : getenv('APP_NAME') }}</h1></span>
            </div>
            <div class="card">
                <div class="body">
                    <form action="{{ route('ajax.reset.password') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ $user->email }}" />
                        <p class="msg text-center">Enter a new password here</p>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Your Password" name="password" required autofocus>
                                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn bg-custom waves-effect" type="submit">Change Password</button>
                            </div>
                        </div>
                        <div class=" m-t-15 m-b-10 text-center">
                            <h6>Having Login Credentials???</h6>
                            <a href="{{ route('login') }}">Login Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
