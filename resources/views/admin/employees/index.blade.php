@extends('layouts.default')
@section('pageTitle', 'Employees')
@section('content')   
@include('layouts.partials.message') 
<!-- ============================================================== -->
<!-- Three charts -->
<!-- ============================================================== -->
<div class="row justify-content-center">
    <div class="container white-box">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('employees.create') }}">Create new Employee</a>
            </div>
        </div>
    </div>
    <div class="white-box">
        <div class="">
            <div class="row">
                <div class="col">
                    <h2>Employees</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($employees as $employe)
                            <tr>
                                <td>{{ $employe->id }}</td>
                                <td>{{ $employe->company->name }}</td>
                                <td>{{ $employe->firstname }}</td>
                                <td>{{ $employe->lastname }}</td>
                                <td>{{ $employe->email }}</td>
                                <td>{{ $employe->phone }}</td>
                                <td>
                
                                    <a href="{{ route('employees.show', $employe->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>

                                    <a href="{{ route('employees.edit', $employe->id) }}">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>

                                    <form action="{{ route('employees.destroy', $employe->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to remove this Employee?')" type="submit" title="delete" style="border: none; background-color:transparent;">
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