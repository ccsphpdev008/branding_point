<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CommonSettings;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->msg = ['status' => 500, 'message' => 'Something wrong!! please try again', 'type' => 'danger'];

        \View::share('settings', CommonSettings::pluck('data', 'field'));
    }

    public function checkDependencies($data_array, $data){
        foreach ($data_array as $key => $dep){
            if(isset($data[$dep[2]])){
                if(isset($dep[3])){
                    if(in_array($data->id, explode(',', implode(',', $dep[0]::pluck($dep[1])->toArray())))){
                        return [
                            'status' => false,
                            'table' => basename($dep[0])
                        ];
                    }
                }
                else{
                    if($dep[0]::where($dep[1], $data[$dep[2]])->count() > 0){
                        return [
                            'status' => false,
                            'table' => basename($dep[0])
                        ];
                    }
                }
            }
        }
        return [
            'status' => true
        ];
    }

    public function uploadImage($image, $p, $field)
    {
        $path = $p;
        $image_path = '';
        $ext = $image->getClientOriginalExtension();
        $new_name = $field.'-'.strtotime(date('d-m-y h:i:s')).'.'.$ext;

        if($image->move($path, $new_name)){
            $image_path = $path;
        }

        return $image_path.''.$new_name;
    }

    public function getDefaultImage(){
        return "public/no_img.jpg";
    }

    public function logEntry($user, $message, $err = ''){
        $uid = str_replace(' ', '_', $user->name).'__'.sprintf("%03d", $user->id);
        config(['logging.channels.vendor.path' => storage_path('logs/vendor/'.$uid.'/'.now()->format('d_m_Y').'.log')]);
        if($err == 'error'){
            \Log::channel('vendor')->error($message);
        }else{
            \Log::channel('vendor')->info($message);
        }
    }

    public function logEntryCustom($message, $err = ''){
        config(['logging.channels.vendor.path' => storage_path('logs/vendor/app_error/'.now()->format('d_m_Y').'.log')]);
        if($err == 'error'){
            \Log::channel('vendor')->error($message);
        }else{
            \Log::channel('vendor')->info($message);
        }
    }

    public function getCababName($name){
        $split = preg_split('/(?=[A-Z])/', $name);
        $values = array_filter($split, fn($value) => !is_null($value) && $value !== '');
        $lower = array_map('strtolower', $values);

        return implode('-', $lower);
    }

    public function getPascalName($name){
        $split = preg_split('/(?=[A-Z])/', $name);
        $values = array_filter($split, fn($value) => !is_null($value) && $value !== '');

        return implode(' ', $values);
    }

    public function getSnackName($name){
        $split = preg_split('/(?=[A-Z])/', $name);
        $values = array_filter($split, fn($value) => !is_null($value) && $value !== '');
        $lower = array_map('strtolower', $values);

        return implode('_', $lower);
    }
}
