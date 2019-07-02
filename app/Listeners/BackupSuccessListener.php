<?php

namespace App\Listeners;

use \Spatie\Backup\Events\BackupWasSuccessful;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Backup;

class BackupSuccessListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BackupWasSuccessful  $event
     * @return void
     */
    public function handle(BackupWasSuccessful $event)
    {
        $paths = explode('/', $event->backupDestination->backups()->newest()->path());
        $filename = $paths[1];
        $filename_exploded = explode('-', $filename);
        $id = $filename_exploded[2];
        $backup = Backup::findOrFail($id);
        $backup->filename = $filename;
        $backup->status = Backup::COMPLETED;
        $backup->save();
        //dd($filename);
//        dd($backup);
    }
}
