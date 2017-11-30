@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (session('message-delete'))
                    <div class="alert alert-danger">{{ session('message-delete') }}</div>
                @endif
                @if (session('message'))
                    <div class="alert alert-info">{{ session('message') }}</div>
                @endif
                <div class="panel panel-primary">

                    <div class="panel-heading">Employees
                        <a href="{{ route('employees.create') }}" class="btn btn-default">Add New Employee</a>
                    </div>
                </div>
                <div class="panel panel-info">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->company_id}}</td>
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}"
                                       class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                       class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{route('employees.destroy', $employee->id)}}" method="POST"
                                          style="display: inline"
                                          onsubmit="return confirm('Ar jūs tikria norite ištrinti įrašą?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No entries found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection