
  
  @extends('layouts.app')
      
  @section('content')
    
  <div class="card mt-5">
    <h2 class="card-header">Add New Blog</h2>
    <div class="card-body">
    
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    
      <form action="{{ url('api/blog') }}" method="POST" enctype="multipart/form-data">
          @csrf
    
          <div class="mb-3">
              <label for="inputName" class="form-label"><strong>Title:</strong></label>
              <input 
                  type="text" 
                  name="title" 
                  class="form-control @error('title') is-invalid @enderror" 
                  id="inputName" 
                  placeholder="Title">
              @error('title')
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
                placeholder="Author Name">
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
                  placeholder="Upload...">
              @error('image')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>
    
          <div class="mb-3">
              <label for="inputDetail" class="form-label"><strong>Description:</strong></label>
              <textarea 
                  class="form-control @error('description') is-invalid @enderror" 
                  style="height:150px" 
                  name="description" 
                  id="inputDetail" 
                  placeholder="Write your description for the blog..."></textarea>
              @error('description')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="mb-3">
            <label for="status" class="form-label"><strong>Status:</strong></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="active" value="0" checked>
                <label class="form-check-label" for="active">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="inactive" value="1">
                <label class="form-check-label" for="inactive">
                    Inactive
                </label>
            </div>
            @error('status')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


          <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </form>
    
    </div>
  </div>
  @endsection