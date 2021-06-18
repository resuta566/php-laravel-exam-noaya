@extends('layouts.default')
@section('pageTitle', 'Companies')
@section('content')   
@include('layouts.partials.message') 
<!-- ============================================================== -->
<!-- Three charts -->
<!-- ============================================================== -->
<div class="row justify-content-center">
    <div class="container white-box">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('companies.create') }}">Create new Company</a>
            </div>
        </div>
    </div>
    <div class="white-box">
        <div class="">
            <div class="row">
                <div class="col">
                    <h2>Companies</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">                    
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->logo }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                
                                    <a href="{{ route('companies.show', $company->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>

                                    <a href="{{ route('companies.edit', $company->id) }}">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>

                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
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
                    {{ $companies->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection