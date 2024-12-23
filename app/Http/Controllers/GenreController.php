<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $allGenres = Genre::get();
        return view('genre.index',compact('allGenres'));
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->genre_name = $request->genre_name;
        $genre->save();

        $allGenres = Genre::get();
        return view('genre.index',compact('allGenres'));
    }

    public function edit(Genre $genre)
    {
        return view('genre.edit',compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $genre->genre_name = $request->genre_name;
        $genre->save();

        $allGenres = Genre::get();
        return view('genre.index',compact('allGenres'));
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        $allGenres = Genre::get();
        return view('genre.index',compact('allGenres'));
    }
}
