@extends('front.layout.layout')
@section('content')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h2>Reset Password</h2></div>
                    <div class="card-body custom-form">
    
                      @if (Session::has('message'))
                           <div class="alert alert-success" role="alert">
                              {{ Session::get('message') }}
                          </div>
                      @endif
    
                        <form action="{{ route('forget.password.post') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <input type="text" id="email_address" class="form-control col-md-6" name="email" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-5">
                                <button type="submit" class="btn btn-primary" style="color:rgb(43, 105, 121)">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
  </main>
@endsection
