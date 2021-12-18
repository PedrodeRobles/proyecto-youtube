<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome', [
            'videos' => Video::latest()->get()
        ]);
    }
}
