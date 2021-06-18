@extends('layouts.default')
@section('pageTitle', 'Show '.$company->name.'')
@section('content')
@include('layouts.partials.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{$company->name}}</h3>
                        </div>
                        <div class="col-3">
                            <a href="{{route('companies.edit', $company->id)}}" class="btn btn-secondary">EDIT</a>
                        </div>
                        <div class="col-3">                            
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure to remove this Company?')" type="submit" title="delete" style="border: none; background-color:transparent;">
                                    DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="email" class="col-md-12 p-0">Name</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input id="name" type="text"
                                class="form-control p-0 border-0" name="name"
                                value="{{ $company->name }}"
                                readonly
                                autocomplete="name" 
                                autofocus>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Email</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="email"
                                name="email"
                                class="form-control p-0 border-0 @error('email') is-invalid @enderror"
                                readonly
                                value="{{ $company->email }}">
                        </div>
                    </div>                        
                    <div class="form-group mb-4">
                        <label for="email" class="col-md-12 p-0">Logo</label>
                        <div class="col-md-12 border-bottom p-0">
                            <img style="height: 100%; width: 100%" src="{{ asset($company->logo) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email" class="col-md-12 p-0">Website</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input id="website" type="text"
                                class="form-control p-0 border-0 @error('website') is-invalid @enderror" 
                                name="website"
                                value="{{ $company->website }}"
                                readonly
                                autocomplete="website">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Employees
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($employees as $employe)
                            <tr>
                                <td>{{ $employe->id }}</td>
                                <td>{{ $employe->firstname }}</td>
                                <td>{{ $employe->lastname }}</td>
                                <td>{{ $employe->email }}</td>
                                <td>{{ $employe->phone }}</td>
                                <td>
                
                                    <a href="{{ route('companies.show', $employe->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>

                                    <a href="{{ route('companies.edit', $employe->id) }}">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>

                                    <form action="{{ route('companies.destroy', $employe->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to remove this Company?')" type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $employees->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection