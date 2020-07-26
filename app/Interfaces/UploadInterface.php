<?php

namespace App\Interfaces;

interface UploadInterface
{
    public function getFile($file);
    public function getFileName();
    public function fileDestination();
}
