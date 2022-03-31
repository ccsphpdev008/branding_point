<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaravelLogReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogReaderController extends Controller
{
    public function getIndex()
    {
        return view('admin.logs.index');
    }

    public function getLogData(Request $request)
    {
        return (new LaravelLogReader())->all();
    }

    public function getLogUsers(Request $request)
    {
        $data = [];
        if ($request->has('user')) {
            $data['user'] = $request->get('user');
        }
        return (new LaravelLogReader($data))->users();
    }

    public function getLogs(Request $request)
    {
        $data = [];
        if ($request->has('date')) {
            $data['date'] = $request->get('date');
        }
        if ($request->has('user')) {
            $data['user'] = $request->get('user');
        }
        return (new LaravelLogReader($data))->date();
    }

    public function postDelete(Request $request)
    {
        if($request->has('user') && $request->has('date')) {
            $file = 'logs/vendor/'.$request->get('user').'/'.$request->get('date');
            if (File::exists(storage_path($file))) {
                File::delete(storage_path($file));
                return ['success' => true, 'message' => 'Successfully deleted'];
            }
        }
        return ['success' => false, 'message' => 'not deleted'];
    }
}
