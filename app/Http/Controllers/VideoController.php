<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        return view('videos.index', [
            'videos' => auth()->user()->videos
        ]);
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(VideoRequest $request)
    {
        //salvar
        $video = Video::create([
            'user_id' => auth()->user()->id,
        ] + $request->all());

        //imagen
        if ($request->hasFile('image')) {
            $video->image = $request->file('image')->store('videos', 'public');
            $video->save();
        }

        //video
        if ($request->hasFile('iframe')) {
            $video->iframe = $request->file('iframe')->store('videos2', 'public');
            $video->save();
        }

        return redirect()->route('videos.index');
    }

    public function edit(Video $video)
    {
        $this->authorize('pass', $video);

        return view('videos.edit', compact('video'));
    }

    public function update(VideoRequest $request, Video $video)
    {
        $this->authorize('pass', $video);

        $video->update($request->all());

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($video->image);
            $video->image = $request->file('image')->store('videos', 'public');
            $video->save();
        }

        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        $this->authorize('pass', $video);

        Storage::disk('public')->delete($video->image);
        $video->delete();

        return redirect()->route('videos.index');
    }
}
