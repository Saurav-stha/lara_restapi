@extends('layouts.app')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">Show blog</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong> <br/>
                {{ $blog->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Description:</strong> <br/>
                {{ $blog->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Author Name:</strong> <br/>
                {{ $blog->author_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Genre:</strong> <br/>
                {{ $blog->genre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Image:</strong> <br/>
                <img src="{{ $blog->image_url }}" alt="{{$blog->title}}" style="max-width: 10%; height: auto;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Status:</strong> <br/>
                
                @if(!$blog->status)
                    <button class="btn btn-success"> Active</button>
                @else
                    <button class="btn btn-danger"> Inactive</button>
                @endif

            </div>
        </div>
    </div>
  
    <a class="btn btn-primary btn-sm" href="{{ route('blogs.edit',$blog->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

  </div>
</div>
@endsection