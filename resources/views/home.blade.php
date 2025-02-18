@include('components.nav')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Logged in!') }}
                </div>
            </div>
            <div class="card">
                <a href="{{ route('blogs.index') }}">
                    {{ __('View Blogs') }}
                </a>
            </div>
            <div class="card">
                <a href="{{ route('genre.index') }}">
                    {{ __('Genre') }}
                </a>
            </div>

            @if(Auth::user()->role == 1)
            <div class="card">
                <a href="{{ route('upload.index') }}">
                    {{ __('Bulk Upload') }}
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
