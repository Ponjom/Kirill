<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumCreateRequest;
use App\Http\Requests\AlbumUpdateRequest;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums',
        [
            'albums' => $albums,
        ]);
    }

    public function create()
    {
        return view('admin.album.create');
    }

    public function store(AlbumCreateRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('albums', $request->image);
        Album::create($data);
        return redirect()->route('admin.index');
    }

    public function show($album)
    {
        $album = Album::with('tracks')->find($album);
        return view('album',
        [
            'album' => $album,
        ]);
    }

    public function edit(Album $album)
    {
        return view('admin.album.edit',
        [
            'album' => $album,
        ]);
    }

    public function update(AlbumUpdateRequest $request, Album $album)
    {
        $data = $request->validated();
        if ($request->image) {
            Storage::delete($album->image);
            $data['image'] = Storage::disk('public')->put('events', $request->image);
        } else {
            unset($data['image']);
        }
        $album->update($data);
        return redirect()->route('admin.index');
    }

    public function destroy(Album $album)
    {
        Storage::disk('public')->delete($album->image);
        $tracks = Track::where('album_id', $album->id)->get();
        foreach ($tracks as $track) {
            Storage::disk('public')->delete($track->path);
            $track->delete();
        }
        $album->delete();
        return redirect()->route('admin.index');
    }
}
