@include('components.nav')

@extends('layouts.app')

@section('content')

<h2>Edit Genre</h2>

<form action="{{ route('genre.update',$genre->id) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="genre_name">Genre Name:</label>
        <input type="text" class="form-control" id="name" name="genre_name" value="{{ $genre->genre_name }}">
    </div>
    <button type="submit" class="btn btn-primary">Add Genre</button>
</form>

@endsection

