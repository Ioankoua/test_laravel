@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Venues</h1>
        <a href="{{ route('venues.create') }}" class="btn btn-primary">Add Venue</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venues as $venue)
                    <tr>
                        <td>{{ $venue->name }}</td>
                        <td>
                            <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $venues->links() }}
    </div>
@endsection
