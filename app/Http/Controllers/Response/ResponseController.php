<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use App\Supports\Str;

final class ResponseController extends Controller
{
    /**
     * Handle response file.
     *
     * @param string $fileName
     */
    public function handle(string $fileName)
    {
        return $this->responseFile(Str::fileRequest($fileName));
    }

    /**
     * Handle download file.
     */
    public function download(string $fileName)
    {
        return $this->responseDownload(Str::fileRequest($fileName));
    }
}
