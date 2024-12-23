@extends('layouts.app')

@section('content')

<form action="{{ route('genre.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="genre_name">Genre Name:</label>
        <input type="text" class="form-control" id="name" name="genre_name" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Genre</button>
</form>

@endsection