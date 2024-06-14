@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>

        <div class="mb-4">
            <h3>Weather Information</h3>
            @if ($weather)
                <p>Temperature: {{ $weather['hours'][0]['airTemperature']['noaa'] }} °C</p>
            @else
                <p>Could not fetch weather data.</p>
            @endif
        </div>

        <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Poster</th>
                    <th>Event Date</th>
                    <th>Venue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td><img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->name }}" width="100"></td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->venue->name }}</td>
                        <td>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $events->links() }}
    </div>
@endsection
