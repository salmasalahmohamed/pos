<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class check extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view{file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make new file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $argument=$this->argument('file');
        $fullpath=$this->fullpath($argument);
        $this->checkfolder($fullpath);
        if (file_exists($fullpath)){
            $this->error('');
            return;
        }
        File::put($fullpath,$fullpath);
    }
    public function fullpath($argument){
        $path=str_replace('.','/',$argument).'.blade.php';
        return "resources/views{$path}";
    }
    public function checkfolder($fullpath)
    {
        $directory=dirname($fullpath);
        if(!file_exists($directory)){
            mkdir($directory);

        }
    }}
