


@include('components.nav')

@extends('blogs.layout')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">BLOG</h2>
    <div class="card-body">
            
          {{-- @session('success')
              <div class="alert alert-success" role="alert"> {{ $value }} </div>
          @endsession --}}
    
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a class="btn btn-success btn-sm" href="{{ route('blogs.create') }}"> <i class="fa fa-plus"></i> Create New Blog</a>
          </div>
    
          <table class="table table-bordered table-striped mt-4">
              <thead>
                  <tr>
                      <th width="80px">No</th>
                      <th>Blog Title</th>
                      <th>Description</th>
                      <th>Author</th>
                      <th>Status</th>
                      <th width="250px">Action</th>
                  </tr>
              </thead>
    
              <tbody>
              @forelse ($blogs as $blog)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>{{ $blog->author_name}}</td>
                    <td>
                        @if(!$blog->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    
                    </td>
                    <td>
                        <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
            
                            <a class="btn btn-info btn-sm" href="{{ route('blogs.show',$blog->id) }}"><i class="fa-solid fa-list"></i> Show</a>
            
                            <a class="btn btn-primary btn-sm" href="{{ route('blogs.edit',$blog->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
              @empty
                  <tr>
                      <td colspan="4">There are no data.</td>
                  </tr>
              @endforelse
              </tbody>
    
          </table>
    
    </div>
  </div>  
  @endsection