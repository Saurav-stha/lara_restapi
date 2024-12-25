@extends('layouts.app')

@section('content')
    <h1>Upload Excel File</h1>
    <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="excelFile">Select Excel File:</label>
        <input type="file" name="uploadedFile" id="excelFile" required>
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
@endsection
