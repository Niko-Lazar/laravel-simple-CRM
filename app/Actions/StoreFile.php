<?php

namespace App\Actions;

class storeFile
{
    public function handle(string $file, string $dir) : array
    {
        return [
            'path' => request()->file($file)->store($dir),
            'name' => request()->file($file)->getClientOriginalName(),
            'extension' => request()->file($file)->getClientOriginalExtension(),
            'size' => request()->file($file)->getSize(),
        ];
    }
}
