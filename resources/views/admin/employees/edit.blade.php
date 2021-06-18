@extends('layouts.default')
@section('pageTitle', 'Edit Employee '. $employee->fullName())
@section('content')
@include('layouts.partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Edit Employee '. $employee->fullName()) }}</h3>
                </div>

                <div class="card-body">      
                    <form method="POST" action="{{ route('employees.update', $employee->id ) }}" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-4">
                            <label for="firstname" class="col-md-12 p-0">Company</label>
                            <select class="form-control" name="company_id" aria-label="Default select example">
                                @foreach ($companies as $key => $company)
                                    <option {{ $employee->company_id == $key ? 'selected' : '' }} 
                                        value="{{$key}}">{{ $company }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="firstname" class="col-md-12 p-0">First Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input id="firstname" type="text"
                                    class="form-control p-0 border-0 @error('firstname') is-invalid @enderror" 
                                    name="firstname"
                                    value="{{ old('firstname') ?? $employee->firstname }}"
                                    required
                                    autocomplete="firstname" 
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Last Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text"
                                    name="lastname"
                                    class="form-control p-0 border-0 @error('lastname') is-invalid @enderror"
                                    required
                                    value="{{ old('lastname') ?? $employee->lastname }}">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="form-group mb-4">
                            <label for="email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input id="email" type="email"
                                    class="form-control p-0 border-0 @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') ?? $employee->email }}"
                                    required
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="email" class="col-md-12 p-0">Phone</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input id="phone" type="number" step="1" minlength="11" maxlength="15"
                                    class="form-control p-0 border-0 @error('phone') is-invalid @enderror" 
                                    name="phone"
                                    value="{{ old('phone') ?? $employee->phone }}"
                                    required
                                    autocomplete="phone">

                                @error('phone')
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