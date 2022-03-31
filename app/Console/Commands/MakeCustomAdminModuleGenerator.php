<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeCustomAdminModuleGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Custom Admin Module';

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
     * @return int
     */
    public function handle()
    {
        $argument_name = $this->argument('name');
        $view_name = str_replace(' ', '_', strtolower($argument_name));
        $model_name = str_replace(' ', '', $argument_name);
        
        \Artisan::call('make:model '.$model_name.' -a');
        \Artisan::call('make:view '.$view_name);

        dd('done');
    }
}
