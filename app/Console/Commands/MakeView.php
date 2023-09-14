<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view{view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' create new view';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data=$this->argument('view');
         $path=$this->getfullpath($data);
         $dir=$this->checkfolder($path);
         if(File::exists($path)){
              $this->error('this file alreadu exist');

         }else
             File::put($path,$path);
    }
    /** @return  string */
    public function getfullpath($data)
    {
        $view=str_replace('.','/',$data).'.blade.php';
           $path="resources/views/{$view}";
           return $path;
    }
    public function checkfolder($path){
        $directory=dirname($path);
        if (!file_exists($directory))
            mkdir($directory,0777,true);
    }
}
