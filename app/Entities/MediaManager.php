<?php

namespace App\Entities;

class MediaManager extends Manager
{
    // thumbnails
    // avatars
    // images
    // - generate thumbnail
    // videos
    // assets
    // ajax

    // Change file name - ajax handler
    static function onApplyName($filepath, $newName)
    {
        //
    }

    // Create directory - ajax handler
    static function onCreateDirectory($dirpath)
    {
        //
    }

    // Delete file - ajax handler
    static function onDeleteFile($filepath)
    {
        //
    }

    // Delete directory - ajax handler
    static function onDeleteDirectory($dirpath, $recursively = false)
    {
        //
    }

    static function onGenerateThumbnails()
    {
        //
    }

    static function uploadTempFile()
    {
        //
    }

}
