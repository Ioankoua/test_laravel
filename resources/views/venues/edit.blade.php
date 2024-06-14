@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Venue</h1>
        <form action="{{ route('venues.update', $venue->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $venue->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
