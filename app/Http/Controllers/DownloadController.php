<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class DownloadController extends Controller
{
    public function download(Publication $publication)
    {
        $file = $publication->document;
        return Storage::download($file);
        return back();
    }
}
