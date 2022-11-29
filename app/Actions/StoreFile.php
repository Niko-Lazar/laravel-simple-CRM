<?php

namespace App\Actions;

class storeFile
{
    public function handle($requestedFile, string $dir) : array
    {
        if(!$requestedFile) {
            return [];
        }

        return [
            'path' => $requestedFile->store($dir),
            'name' => $requestedFile->getClientOriginalName(),
            'extension' => $requestedFile->getClientOriginalExtension(),
            'size' => $requestedFile->getSize(),
        ];
    }
}
