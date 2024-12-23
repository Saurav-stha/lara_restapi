@include('components.nav')
@extends('layouts.app')

@section('content')

<h2>Genres</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Genre Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allGenres as $genre)
        <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->genre_name }}</td>
            <td>  
                <form action="{{ route('genre.destroy',$genre->id) }}" method="POST">
                
                    <a class="btn btn-primary btn-sm" href="{{ route('genre.edit',$genre->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection