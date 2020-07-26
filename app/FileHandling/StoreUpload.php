<?php

namespace App\FileHandle;

use App\Interfaces\UploadInterface;

class StoreUpload implements UploadInterface
{

    public $file;

    public function getFile($file)
    {
        $this->file = $file;

        dd($this->file);
    }

    public function fileDestination()
    {
        // TODO: Implement fileDestination() method.
    }

    public function getFileName()
    {
        // TODO: Implement getFileName() method.
    }
}
