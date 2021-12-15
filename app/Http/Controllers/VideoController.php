<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use Illuminate\Support\Facades\Auth;

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
        return view('videos.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'iframe' => 'required',
        // ]);

        //salvar
        $video = Video::create([
            'user_id' => auth()->user()->id,
        ] + $request->all());

        //imagen
        if ($request->hasFile('foto')) {
            $video->foto = $request->file('foto')->store('videos', 'public');
            $video->save();
        }

        // $request->user()->videos()->create($request->all());
        return redirect()->route('videos.index');
    }

    public function show(Video $video, Request $request)
    {
        if ($request->user()->id != $video->user_id) {
            abort(403);
        }

        return view('videos.show', $video);
    }

    public function edit(Video $video, Request $request)
    {
        if ($request->user()->id != $video->user_id) {
            abort(403);
        }

        return view('videos.edit', compact('video'));
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
