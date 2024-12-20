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
                <a href="{{ route('blogs') }}">
                    {{ __('View Blogs') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
