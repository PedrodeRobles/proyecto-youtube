<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        return view('videos.index', [
            'videos' => $request->user()->videos
        ]);
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

        if ($request->user()->id != $video->user_id) {
            abort(403);
        }

        $video->update($request->all());

        return redirect()->route('videos.edit', $video);
    }

    public function destroy(Video $video, Request $request)
    {
        if ($request->user()->id != $video->user_id) {
            abort(403);
        }

        $video->delete();

        return redirect()->route('videos.index');
    }
}
