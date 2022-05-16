<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events',
        [
            'events' => $events,
        ]);
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(EventCreateRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('events', $request->image);
        Event::create($data);
        return redirect()->route('admin.index');
    }

    public function show(Event $event)
    {
        return view('event', [
            'event' => $event,
        ]);
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit',
            [
                'event' => $event,
            ]);
    }

    public function update(EventUpdateRequest $request, Event $event)
    {
        $data = $request->validated();
        if ($request->image) {
            Storage::disk('public')->delete($event->image);
            $data['image'] = Storage::disk('public')->put('events', $request->image);
        } else {
            unset($data['image']);
        }
        $event->update($data);
        return redirect()->route('admin.index');
    }

    public function destroy(Event $event)
    {
        Storage::disk('public')->delete($event->image);
        $event->delete();
        return redirect()->route('admin.index');
    }
}
