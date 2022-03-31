@extends('front.layout.layout')
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
        <div class="col-md-3"></div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header text-center"><h2>Reset Password</h2></div>
                  <div class="card-body custom-form">
                    
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif

                      <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-12">
                                        <input type="text" id="email_address" class="form-control" name="email" value="{{ old() ? old('email') : '' }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" id="password" class="form-control" name="password" required autofocus>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-12">
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 mb-5">
                                    <button type="submit" class="btn btn-primary" style="color: rgb(22, 22, 22)">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
  
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection