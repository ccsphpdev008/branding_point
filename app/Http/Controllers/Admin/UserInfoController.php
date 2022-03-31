<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMaster;
use App\Models\CommonSettings;
use Hash;

class UserInfoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_master = new UserMaster;
        $this->common_settings = new CommonSettings;
    }

    public function profile(){
        \View::share('title', 'My Profile');
        \View::share('action', '<a href="#home" data-href="'.route('admin.dashboard').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>');
        \View::share('record', auth('admin')->user());

        return view('admin.user_info.profile');
    }

    public function profileUpdate(Request $request){
        $id = auth('admin')->id();
        $validated = $request->validate([
            'name' => 'required',
            'text_color' => 'required',
            'bg_color' => 'required',
            'button_color' => 'required',
            'email' => 'required|unique:user_masters,email,'.$id,
            'contact' => 'required|unique:user_masters,contact,'.$id,
        ]);

        $data = $request->except('password', 'change_password', '_token');
        $data['updated_by'] = $id;

        if($request->change_password){
            $data['password'] = Hash::make($request->password);
        }
        $record = $this->user_master->where('id', $id)->update($data);

        $msg = $this->msg;
        if($record){
            $msg =  ['status' => 200, 'message' => 'Your Profile Updated Successfully!!!', 'type' => 'success', 'method' => 'update'];
        }
        return json_encode($msg);
    }

    public function commonSetting(){
        \View::share('title', 'Common Settings');
        \View::share('record', $this->common_settings->pluck('data', 'field'));
        \View::share('action', '<a href="#home" data-href="'.route('admin.dashboard').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>');
        \View::share('more_settings', $this->common_settings->where('is_more', 'yes')->pluck('data', 'id'));

        return view('admin.common_settings');
    }

    public function commonSettingUpdate(Request $request){
        $validated = $request->validate([
            'app_name' => 'required',
            'notification_time' => 'required',
        ]);

        $all = $this->common_settings->pluck('data', 'field');
        $data = $request->except('_token', 'app_logo', 'app_favicon', 'brand_image');

        foreach ($data as $key => $value) {
            $record = [];
            if(!isset($all[$key])){
                $record['field'] = $key;
                $record['data'] = $value;
                $this->common_settings->create($record);
            }else{
                $record['data'] = $value;
                $this->common_settings->where('field', $key)->update($record);
            }
        }

        $app_logo = $request->file('app_logo');
        if(!is_null($app_logo)){
            if(isset($all['app_logo'])){
                if(file_exists($all['app_logo'])){
                    unlink($all['app_logo']);
                }
                $app_logo = $this->uploadImage($app_logo, 'public/media/app/image/', 'app_logo');
                $this->common_settings->where('field', 'app_logo')->update(['data' => $app_logo]);
            }else{
                $app_logo = $this->uploadImage($app_logo, 'public/media/app/image/', 'app_logo');
                $this->common_settings->where('field', 'app_logo')->create(['field' => 'app_logo','data' => $app_logo]);
            }
        }

        $app_favicon = $request->file('app_favicon');
        if(!is_null($app_favicon)){
            if(isset($all['app_favicon'])){
                if(file_exists($all['app_favicon'])){
                    unlink($all['app_favicon']);
                }
                $app_favicon = $this->uploadImage($app_favicon, 'public/media/app/image/', 'app_favicon');
                $this->common_settings->where('field', 'app_favicon')->update(['data' => $app_favicon]);
            }else{
                $app_favicon = $this->uploadImage($app_favicon, 'public/media/app/image/', 'app_favicon');
                $this->common_settings->where('field', 'app_favicon')->create(['field' => 'app_favicon','data' => $app_favicon]);
            }
        }

        //Brand Logo Code
        $brand_image = $request->file('brand_image');
        if(!is_null($brand_image)){
            $this->uploadMultiImage($brand_image, 'public/admin/app/image/brand/', 'brand_image');
        }

        return json_encode(['status' => 200, 'message' => 'Common Settings Updated Successfully!!!', 'type' => 'success', 'method' => 'update']);
    }

    public function commonSettingDelete(Request $request){
        $file = $this->common_settings->where('id', $request->get('id'))->first()->value;
        if(file_exists($file)){
            unlink($file);
        }
        return $this->common_settings->where('id', $request->get('id'))->delete();
    }

    public function uploadMultiImage($image, $path, $field){
        $image_path = '';
        $ext = $image->getClientOriginalExtension();
        $new_name = $field.'-'.strtotime(date('d-m-y h:i:s')).'.'.$ext;

        if($image->move($path, $new_name)){
            $image_path = $path;
        }

        $data = [];
        $data['field'] = $field;
        $data['data'] = $image_path.''.$new_name;
        $data['is_more'] = 'yes';
        $data['more_name'] = $field;
        $this->common_settings->create($data);
    }

    public function about(){
        return view('admin.about');
    }

    public function contact(){
        return view('admin.contact');
    }

    public function addContact(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $CommonSetting = $this->common_settings->where('field', 'mail_to_email')->first();

        $msg = ['status' => 500, 'message' => 'Something wrong!! please try again'];
        $data = $request->all();

        if($CommonSetting){
            $from_mail = getenv('SENDGRID_MAIL_ID');
            if(getenv('APP_ENv') == 'local'){
                $to_mail = getenv('SENDGRID_MAIL_TESTING_ID');
            }else{
                $to_mail = $CommonSetting->data;
            }
            $mail_sub = "Email ghost Contact Request";

            $mail_msg = '<h1>Email ghost Contact Request:</h1>';
            $mail_msg .= '<p> Name: '.$data['name']. ' </p>';
            $mail_msg .= '<p> Email: '.$data['email'].' </p>';
            $mail_msg .= '<p> Message: '.$data['email'].' </p>';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($from_mail, getenv('APP_NAME'));
            $email->setSubject($mail_sub);
            $email->addTo($to_mail, $data['name']);
            $email->addContent("text/html", $mail_msg);

            $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
            try {
                $response = $sendgrid->send($email);

                $msg =  ['status' => 200, 'message' => config('message.contact_info'), 'data' => $response];
            } catch (Exception $e) {
                return json_encode($msg);
            }
        }
        return json_encode($msg);
    }
}
