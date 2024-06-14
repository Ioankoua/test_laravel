@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
            </div>
            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="file" class="form-control" id="poster" name="poster">
                <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->name }}" width="100" class="mt-3">
            </div>
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $event->event_date }}" required>
            </div>
            <div class="form-group">
                <label for="venue_id">Venue</label>
                <select class="form-control" id="venue_id" name="venue_id" required>
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}" {{ $venue->id == $event->venue_id ? 'selected' : '' }}>{{ $venue->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
