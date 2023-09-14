<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Makefolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:folder{folder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data=$this->argument('folder');
        $folder=$this->folder($data);
        $dd=$this->ifexist($folder);
        if(File::exists($folder))
            $this->error('this already exist ');
        else
            File::put($folder,$folder);
    }
    public function folder($data)
    {
      $dir=str_replace('.','/',$data).'.blade.php';
       return $path="resources/view".$dir;
    }
public function ifexist($folder){
        $f=dirname($folder);
        if(!file_exists($f))
            mkdir($f);
        return;

}
}
