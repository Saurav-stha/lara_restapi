@extends('layouts.app')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Edit blog</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ url('api/blog',$blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Title:</strong></label>
            <input 
                type="text" 
                name="title" 
                value="{{ $blog->title }}"
                class="form-control @error('title') is-invalid @enderror" 
                id="inputName" 
                placeholder="Title">
            @error('title')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Description:</strong></label>
            <textarea 
                class="form-control @error('detail') is-invalid @enderror" 
                style="height:150px" 
                name="description" 
                id="inputDetail" 
                placeholder="Description here...">{{ $blog->description }}</textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="authorName" class="form-label"><strong>Author Name:</strong></label>
            <input 
                type="text" 
                name="author_name" 
                class="form-control @error('author_name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Author Name"
                value="{{ $blog->author_name }}">   
            @error('author_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

          <div class="mb-3">
              <label for="image" class="form-label"><strong>Image:</strong></label>
              <input 
                  type="file" 
                  name="image" 
                  class="form-control @error('image') is-invalid @enderror" 
                  id="inputName" 
                  placeholder="Upload..."
                  >
                <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" width="100" height="100">
                <input type="text" name="image_url" id="" value="{{ $blog->image_url }}" width="100" height="100" readonly>
              @error('image')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="mb-3">
            <label for="status" class="form-label"><strong>Status:</strong></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="active" value="0"
                @if(!$blog->status) 
                    checked
                @endif
                 >
                <label class="form-check-label" for="active">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="inactive" value="1"
                @if($blog->status) 
                    checked
                @endif>
                <label class="form-check-label" for="inactive">
                    Inactive
                </label>
            </div>
            @error('status')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
  </div>
</div>
@endsection