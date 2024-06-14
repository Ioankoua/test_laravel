<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Services\WeatherService;
use Location;

class EventController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }
    
    public function index()
    {
        $events = Event::with('venue')->paginate(10);

        $position = Location::get();
        $weather = $this->weatherService->getWeather($position->latitude, $position->longitude);

        return view('events.index', compact('events', 'weather'));
    }

    public function create()
    {
        $venues = Venue::all();
        return view('events.create', compact('venues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'poster' => 'required|image|max:2048',
            'event_date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
        ]);

        $poster_path = $request->file('poster')->store('posters', 'public');

        Event::create([
            'name' => $request->name,
            'poster' => $poster_path,
            'event_date' => $request->event_date,
            'venue_id' => $request->venue_id,
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $venues = Venue::all();
        return view('events.edit', compact('event', 'venues'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'poster' => 'image|max:2048',
            'event_date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('poster')) {
            $poster_path = $request->file('poster')->store('posters', 'public');
            $data['poster'] = $poster_path;
        }

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
