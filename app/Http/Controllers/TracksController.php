<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackCreateRequest;
use App\Http\Requests\TrackUpdateRequest;
use App\Models\Album;
use App\Models\Event;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TracksController extends Controller
{
    public function create()
    {
        $albums = Album::all();
        return view('admin.track.create',
        [
            'albums' => $albums,
        ]);
    }

    public function store(TrackCreateRequest $request)
    {
        $data = $request->validated();
        $data['path'] = Storage::disk('public')->put('tracks', $request->path);
        Track::create($data);
        return redirect()->route('admin.index');
    }

    public function show(Track $track)
    {
        //
    }

    public function edit(Track $track)
    {
        $albums = Album::all();
        return view('admin.track.edit',
            [
                'track' => $track,
                'albums' => $albums,
            ]);
    }

    public function update(TrackUpdateRequest $request, Track $track)
    {
        $data = $request->validated();
        if ($request->path) {
            Storage::disk('public')->delete($track->path);
            $data['path'] = Storage::disk('public')->put('tracks', $request->path);
        } else {
            unset($data['path']);
        }
        $track->update($data);
        return redirect()->route('admin.index');
    }

    public function destroy(Track $track)
    {
        Storage::disk('public')->delete($track->path);
        $track->delete();
        return redirect()->route('admin.index');
    }

    public function like(Track $track)
    {
        $user = auth()->user();
        if ($user->tracks->where('id', $track->id)->first()) {
            $user->tracks()->detach($track->id);
        } else {
            $user->tracks()->attach($track->id);
        }
        return redirect()->back();
    }
}
