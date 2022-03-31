<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Str,DB,Mail;
use App\Http\Controllers\Admin\Controller;

class ForgotController extends Controller
{  

    public function __construct()
    {
        parent::__construct();
    }

    public function showForgetPasswordForm()
      {
         return view('front.auth.forgot_password');
      }
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('front.auth.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('front.auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
    
            $updatePassword = DB::table('password_resets')
                                ->where([
                                    'email' => $request->email, 
                                    'token' => $request->token
                                ])
                                ->first();
            
            if(!$updatePassword){
                return back()->withInput()->withErrors('Your token is expired, please request a new reset password token!');
            }
    
            $user = User::where('email', $request->email)->first();
            if($user){
                $user->password = bcrypt($request->password);
                $user->save();
            }
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
    
            return redirect()->route('home')->with('message', 'Your password has been changed!');
      }
}