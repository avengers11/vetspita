<?php

namespace App\Http\Utils;
use Illuminate\Support\Str;

class Utils
{
    public static function processFile($file, $sub_path = 'attachments')
    {
        $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
        $file = $file->storeAs($sub_path, $attachment, env('FILESYSTEM_DISK'));

        return $file;
    }
}