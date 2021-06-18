@extends('layouts.default')
@section('pageTitle', 'Employee '. $employee->fullName())
@section('content')
@include('layouts.partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{ __('Employee '. $employee->fullName()) }}</h3>
                        </div>
                        <div class="col-3">
                            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-secondary">EDIT</a>
                        </div>
                        <div class="col-3">                            
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure to remove this Employee?')" type="submit" title="delete" style="border: none; background-color:transparent;">
                                    DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="firstname" class="col-md-12 p-0">Company</label>
                            <input id="firstname" type="text"
                                class="form-control p-0 border-0 @error('firstname') is-invalid @enderror" 
                                name="firstname"
                                value="{{ old('firstname') ?? $employee->company->name }}"
                                readonly
                                autocomplete="firstname" 
                                autofocus>
                            </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="firstname" class="col-md-12 p-0">First Name</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input id="firstname" type="text"
                                class="form-control p-0 border-0 @error('firstname') is-invalid @enderror" 
                                name="firstname"
                                value="{{ old('firstname') ?? $employee->firstname }}"
                                readonly
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
                                readonly
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
                                readonly
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
                                class="form-control p-0 border-0 @error('website') is-invalid @enderror" 
                                name="phone"
                                value="{{ old('phone') ?? $employee->phone }}"
                                readonly
                                autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection