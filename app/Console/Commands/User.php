<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class User extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:view{file }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'print statement';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $arg = $this->argument('file');
        $fullpath = $this->index($arg);
        $this->checkfolder($fullpath);
        if(file_exists($fullpath)){
            $this->error('this file already exist');
        }else
        {
            File::put($fullpath,$fullpath);
        }
    }

    public function index($arg)
    {

$path=str_replace('.','/',$arg).',blade.php';
 return $path2="resources/views/{$path}";
    }
    public function checkfolder($fullpath){
        $direcotry=dirname($fullpath);
        if(!file_exists($direcotry)){
            mkdir($direcotry);
        }

    }
}
