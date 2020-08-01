<?php

namespace App\FileHandling;

use App\Interfaces\UploadInterface;
//use Illuminate\Support\Facades\Storage;

class StoreUpload implements UploadInterface
{

    public $file;
    private $destination = 'images/company';

    /** handle the file and save it to the destination
     * @param string $file uploaded file from upload
     */
    public function handleFile($file): string
    {
        $this->file = $file;

        //save file in directory
         $this->file->storeAs($this->destination, $this->getFileName());

        return $this->fileStoredLocation();
    }

    /** getter for file destination
     * @return string
     */
    public function getFileDestination(): string
    {
        return $this->destination;
    }

    /** gets the file name from the file bag object
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file->getClientOriginalName();
    }

    public function fileStoredLocation()
    {
        return "{$this->destination}/{$this->getFileName()}";
    }
}

