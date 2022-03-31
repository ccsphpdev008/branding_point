<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new blade template.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $view = 'admin/'.$this->argument('view');
        
        $path = $this->viewPath($view);
        $path_index = $this->viewPath($view.'/index');
        $path_data = $this->viewPath($view.'/data');

        $this->createDir($path_index);
        if (File::exists($path_index))
        {
            $this->error("File {$path_index} already exists!");
            return;
        }
        File::put($path_index, File::get($this->viewPath('demo/index')));
        
        $this->createDir($path_data);
        if (File::exists($path_data))
        {
            $this->error("File {$path_data} already exists!");
            return;
        }        
        File::put($path_data, File::get($this->viewPath('demo/data')));

        $this->info("File {$path} created.");
    }

     /**
     * Get the view full path.
     *
     * @param string $view
     *
     * @return string
     */
    public function viewPath($view)
    {
        $view = str_replace('.', '/', $view) . '.blade.php';

        $path = "resources/views/{$view}";

        return $path;
    }

    /**
     * Create view directory if not exists.
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    }

}