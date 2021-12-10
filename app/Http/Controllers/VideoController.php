<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'iframe' => 'required',
        ]);

        $request->user()->videos()->create($request->all());

        return redirect()->route('videos.index');
    }

    public function show(Video $video)
    {
        //
    }

    public function edit(Video $video)
    {
        //
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'iframe' => 'required',
        ]);

        $video->update($request->all());

        return redirect()->route('videos.edit', $video);
    }

    public function destroy(Video $video)
    {
        //
    }
}
