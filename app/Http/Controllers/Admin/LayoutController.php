<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserMaster;
use App\Models\CommonSettings;
use Hash, view;

use Twilio\Rest\Client;
use Barryvdh\DomPDF\Facade as PDF;

class LayoutController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function home(){
        \View::share('title', 'Dashboard');
        if(auth('admin')->user()->role_id == 1){
            \View::share('total_roles', 0);
            \View::share('total_users', 0);
            \View::share('total_category', 0);
        } else {
            \View::share('total_roles', 0);
            \View::share('total_users', 0);
            \View::share('total_category', 0);
        }
        return view('admin.dashboard');
    }

    public function dashboard(){
        \View::share('title', 'Dashboard');
        if(auth('admin')->user()->role_id == 1){
            \View::share('total_roles', 0);
            \View::share('total_users', 0);
            \View::share('total_category', 0);
        } else {
            \View::share('total_roles', 0);
            \View::share('total_users', 0);
            \View::share('total_category', 0);
        }
        return view('admin.dashboard-ajax');
    }

    
    public function front(){
        return view('front.home');
    }

    public function login(){
        \View::share('brand_image', CommonSettings::where('is_more', 'yes')->where('more_name', 'brand_image')->pluck('data', 'id'));

        return view('admin.auth.login');
    }

    public function loginCheck(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            
            $this->logEntry(auth('admin')->user(), 'Login Success');

            return redirect()->route('admin.home')->with('flash_success', 'Welcome '.auth('admin')->user()->name);
        }

        return back()->with('flash_danger', 'The provided credentials do not match our records.');
    }

    public function forgot(){
        return view('admin.auth.forgot_password');
    }

    public function forgotPassword(Request $request){
        $email = $request->get('email');

        if($email && $email != ''){
            $user = UserMaster::where('email', $email)->first();

            if($user){
                $from_mail = getenv('SENDGRID_MAIL_ID');
                if(getenv('APP_ENv') == 'local'){
                    $to_mail = getenv('SENDGRID_MAIL_TESTING_ID');
                }else{
                    $to_mail = $data['email'];
                }
                $mail_sub = "Email ghost forgot password Request";
                $mail_msg = 'You can change your password here '.route('password.reset', [Crypt::encrypt($user->id)]);

                $email = new \SendGrid\Mail\Mail();
                $email->setFrom($from_mail, getenv('APP_NAME'));
                $email->setSubject($mail_sub);
                $email->addTo($to_mail, $user->name);
                $email->addContent("text/plain", $mail_msg);

                $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                try {
                    $response = $sendgrid->send($email);
                    if($response){
                        $user->is_password_changed = 'no';
                        $user->save();
                    }
                } catch (Exception $e) {}
            }
        }
        return back()->with('flash_info', 'The account connected with the provided E-mail will get a password reset mail link.');
    }

    public function passwordReset($id){
        try {
            $did = Crypt::decrypt($id);
            $user = UserMaster::find($did);
            if($user){
                if($user->is_password_changed == 'yes'){
                    return redirect()->route('login')->with('flash_info', 'The user have already changed the password!!!');
                }
                return view('admin.auth.recover_password', compact('user'));
            }
        } catch (Exception $e) {}

        return redirect()->route('admin.home');
    }

    public function passwordResetPost(Request $request){
        // Validate Form Request
        $request->validate([
            'password' =>'required',
            'email' =>'required'
        ]);

        try{
            $data = $request->all();
            $user = UserMaster::where('email', $data['email'])->first();

            if($user && $data['password'] != '' && $user->is_password_changed != 'yes'){
                $user->password = Hash::make($data['password']);
                $user->is_password_changed = 'yes';
                $user->save();

                
                $this->logEntry(auth('admin')->user(), 'Password Reset Success');

                return redirect()->route('login')->with('flash_success', 'Password Changed successfully!!!');
            }
        }catch(\Exception $e){}

        return back()->with('flash_danger', 'Oops!!! Something went wrong, please try again...');
    }

    public function logout(){
        
        $this->logEntry(auth('admin')->user(), 'Logout Success');

        Auth::guard('admin')->logout();
        return redirect()->route('login')->with('flash_success', 'Logout Success');
    }

    public function loginAsUser($id){
        Auth::loginUsingId($id, true);
        return redirect()->route('admin.home');
    }

    public function positionSave(Request $request){
        $request->validate([
            'model' =>'required',
            'id' =>'required',
            'position' =>'required'
        ]);
        
        $data = $request->all();
        $item = DB::table($data['model'])->where('id', $data['id'])->first();
        if ($item) {
            DB::table($data['model'])->where('id', $data['id'])->update(['position' => $data['position']]);

            $this->logEntry(auth('admin')->user(), 'The '.$data['model'].' Position Changed with id:'.$item->id);
            return json_encode(['status' => 200, 'message' => 'Position Updated Successfully', 'type' => 'success']);
        }
        return json_encode($this->msg);
    }
}
