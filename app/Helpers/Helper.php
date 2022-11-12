<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function getDefaultFormat($date, $format = 'Y-m-d H:i:s')
{
    return $date ? date($format, strtotime($date)) : $date;
}

function uploadFile(UploadedFile $file, $folder, $id)
{
    return $file->store($folder . '/' . $id, 'public');
}

function deleteFile($path)
{
    if (Storage::disk('public')->exists($path)) {
        return Storage::disk('public')->delete($path);
    }
    return false;
}

function getFormattedPrice($value) {
    return number_format($value, 2);
}