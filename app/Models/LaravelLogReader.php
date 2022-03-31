<?php
/**
 * Creator: MD.HARUN-UR-RASHID
 * Date: 25/01/2020
 * Website: laravelarticle.com
 */
namespace App\Models;
use File;

class LaravelLogReader
{
    protected $final = [];
    protected $config = [];

    public function __construct($config = [])
    {
        if (array_key_exists('user', $config)) {
            $this->config['user'] = $config['user'];
        } else {
            $this->config['user'] = null;
        }
        if (array_key_exists('date', $config)) {
            $this->config['date'] = $config['date'];
        } else {
            $this->config['date'] = null;
        }
    }

    public function all()
    {
        return response()->json(['success' => true, 'available_log_users' => $this->getLogUsers()]);
    }

    public function users()
    {
        $all_files = $this->getLogFileDates();
        
        if (count($all_files) <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'No log files found with selected user',
            ]);
        }

        return response()->json(['success' => true, 'available_log_dates' => $all_files]);
    }

    public function date()
    {
        $fileName = $this->config['date'];
        $content = file_get_contents(storage_path('logs\vendor\\'.$this->config['user'].'\\'. $fileName));
        $pattern = "/^\[(?<date>.*)\]\s(?<env>\w+)\.(?<type>\w+):(?<message>.*)/m";
        preg_match_all($pattern, $content, $matches, PREG_SET_ORDER, 0);

        $logs = [];
        foreach ($matches as $match) {
            $logs[] = [
                'timestamp' => $match['date'],
                'env' => $match['env'],
                'type' => $match['type'],
                'message' => trim($match['message'])
            ];
        }

        $data = [
            'date' => $fileName,
            'logs' => $logs
        ];

        return response()->json(['success' => true, 'data' => $data]);
    }


    private function getLogFileDates()
    {
        if(!$this->config['user']){
            return [];
        }
        $dates = [];
        $files = glob(storage_path('logs\vendor\\'.$this->config['user'].'\*.log'));
        $files = array_reverse($files);
        foreach ($files as $path) {
            $fileName = basename($path);
            array_push($dates, $fileName);
        }

        return $dates;
    }

    private function getLogUsers()
    {
        $u_names = [];
        $users = File::directories(storage_path('logs\vendor'));
        foreach ($users as $user) {
            array_push($u_names, basename($user));
        }

        return $u_names;
    }

}
