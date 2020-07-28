<?php

namespace App\FileHandle;

use App\Interfaces\UploadInterface;
use Illuminate\Support\Facades\Storage;

class StoreUpload implements UploadInterface
{

    public $file;
    private $destination = 'images/company';

    public function handleFile($file)
    {
        $this->file = $file;

        $this->file->storeAs($this->destination, $this->getFileName());
    }

    public function getFileDestination()
    {
        return $this->destination;
    }

    public function getFileName()
    {
        return $this->file->getClientOriginalName();
    }

}
