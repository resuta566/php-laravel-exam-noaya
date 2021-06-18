@extends('layouts.default')
@section('pageTitle', 'Edit Company '. $company->name)
@section('content')
@include('layouts.partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Edit Company '. $company->name) }}</h3>
                </div>

                <div class="card-body">      
                    <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-4">
                            <label for="email" class="col-md-12 p-0">Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input id="name" type="text"
                                    class="form-control p-0 border-0 @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') ?? $company->name }}"
                                    required
                                    autocomplete="name" 
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email"
                                    name="email"
                                    class="form-control p-0 border-0 @error('email') is-invalid @enderror"
                                    required
                                    value="{{ old('email') ?? $company->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="form-group mb-4">
                            <label for="email" class="col-md-12 p-0">Logo</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input id="logo" type="file"
                                    class="form-control p-0 border-0 @error('logo') is-invalid @enderror"
                                    name="logo"
                                    value="{{ old('logo') }}"
                                    autocomplete="logo">

                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="col-md-12 p-0">Website</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input id="website" type="text"
                                    class="form-control p-0 border-0 @error('website') is-invalid @enderror" 
                                    name="website"
                                    value="{{ old('website') ?? $company->website }}"
                                    required
                                    autocomplete="website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Submit') }}
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