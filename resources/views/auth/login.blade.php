@extends('layouts.guest')
@section('pageTitle', 'Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Login') }}</h3>
                </div>

                <div class="card-body">                    
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal form-material">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input id="email" type="email"
                                    class="form-control p-0 border-0 @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email" 
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password"
                                    name="password"
                                    class="form-control p-0 border-0 @error('password') is-invalid @enderror"
                                    required 
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-md-12 border-bottom p-0">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}>
                                    
                                <label class="form-check-label">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.guest')
@section('pageTitle', 'Dashboard')
@section('content')

@endsection --}}