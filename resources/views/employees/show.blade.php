@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="text-right">Employee info</div>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $employees->name }}</td>
                                {{--{{dd($employees)}}--}}
                                <td>{{ $employees->email }}</td>
                                <td>{{ $employees->company_id}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <a href="{{ route('employees.index') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
