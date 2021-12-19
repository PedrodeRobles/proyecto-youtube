<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome', [
            'videos' => Video::latest()->get()
        ]);
    }

    public function show(Video $video)
    {
        return view('video', [
            'video' => $video,
            'videos' => Video::latest()->get()
        ]);
    }
}
