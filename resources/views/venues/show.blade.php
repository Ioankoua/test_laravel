@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Venue Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $venue->name }}</h5>
                <p class="card-text">Created at: {{ $venue->created_at }}</p>
                <p class="card-text">Updated at: {{ $venue->updated_at }}</p>
            </div>
        </div>
        <a href="{{ route('venues.index') }}" class="btn btn-primary mt-3">Back to Venues</a>
    </div>
@endsection
