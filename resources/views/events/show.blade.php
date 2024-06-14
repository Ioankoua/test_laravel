@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->name }}" class="img-fluid">
                <p class="card-text">Event Date: {{ $event->event_date }}</p>
                <p class="card-text">Venue: {{ $event->venue->name }}</p>
                <p class="card-text">Created at: {{ $event->created_at }}</p>
                <p class="card-text">Updated at: {{ $event->updated_at }}</p>
            </div>
        </div>
        <a href="{{ route('events.index') }}" class="btn btn-primary mt-3">Back to Events</a>
    </div>
@endsection
