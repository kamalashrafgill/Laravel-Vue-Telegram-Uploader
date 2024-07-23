<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProcessTelegramUploadJob implements ShouldQueue
{
    use Queueable;
    /**
     * Create a new job instance.
     */
    public function __construct(public $fileAbsolutePathpath, public $filePathRelativeToDisk)
    {
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {        
        //absolute path of telegram-uploader
        $telegramPathToBinary = config('telegram.path_to_binary');
        
        //command to activate Python virtual environment
        $commandActiveEnvironment = 'source bin/activate';
       
        //command to upload file to telegram
        $commandUpload = 'telegram-upload ' . $this->fileAbsolutePathpath . ' --to ' . config('telegram.chat_id');
        
        //create full command
        $fullCommand = "cd $telegramPathToBinary && $commandActiveEnvironment && $commandUpload";
        
        //execute command
        shell_exec($fullCommand);

        //Delete the file after uploading
        Storage::disk('public')->delete($this->filePathRelativeToDisk);
    }
    public function onQueue()
    {
        return 'telegram-uploads';
    }
}