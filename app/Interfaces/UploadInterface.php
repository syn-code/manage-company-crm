<?php

namespace App\Interfaces;

interface UploadInterface
{
    public function handleFile($file);
    public function getFileName();
    public function getFileDestination();
}
