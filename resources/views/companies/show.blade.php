@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <div class="text-right">Company Info</div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Logo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $companies->name }}</td>
                            {{--{{dd($companies)}}--}}
                            <td>{{ $companies->address }}</td>
                            <td><img style="width: 100px " src="/images/{{$companies->logo}}"></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
                <a href="{{ route('companies.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
