@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                            <div class="col-md-6">
                                <select id="occupation" class="form-control @error('occupation') is-invalid @enderror" name="occupation" required autocomplete="occupation">
                                    <option value="" disabled selected>{{ __('Select Occupation') }}</option>
                                    <option value="teacher" {{ old('occupation') == 'teacher' ? 'selected' : '' }}>{{ __('Teacher') }}</option>
                                    <option value="engineer" {{ old('occupation') == 'engineer' ? 'selected' : '' }}>{{ __('Engineer') }}</option>
                                    <option value="doctor" {{ old('occupation') == 'doctor' ? 'selected' : '' }}>{{ __('Doctor') }}</option>
                                    <option value="developer" {{ old('occupation') == 'developer' ? 'selected' : '' }}>{{ __('Developer') }}</option>
                                </select>
                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                        
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="form-check mr-3">
                                        <input id="status_active" type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status" 
                                        value=0
                                        {{ old('status') == 0 ? 'checked' : '' }}
                                        required>
                                        <label for="status_active" class="form-check-label">{{ __('Active') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="status_inactive" type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status" 
                                        value=1
                                        {{ old('status') == 1 ? 'checked' : '' }} 
                                        required>
                                        <label for="status_inactive" class="form-check-label">{{ __('Inactive') }}</label>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                @if (Route::has('login'))
                                    <a class="btn-link" href="{{ route('login') }}">{{ __('Already have an account?') }}</a>
                                    
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
