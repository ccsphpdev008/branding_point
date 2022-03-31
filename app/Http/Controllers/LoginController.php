<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use App\Http\Controllers\Admin\Controller;

class LoginController extends Controller
{  

    public function __construct()
    {
        parent::__construct();
    }

    public function registerSave(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user-> save();
        return response()->json(['message' => 'Success', 'status' => 200]);
    }

    public function loginCheck(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Success', 'status' => 200]);
        }
        return response()->json(['message' => 'Invalid Credentials...', 'status' => 400]);
    }

    public function logout(){
        Auth::logout();
        session()->flush();

        return redirect()->route('home');
    }

    
}
