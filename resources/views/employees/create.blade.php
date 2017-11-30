@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Add New Employee</div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="panel-body">
                            @if ($errors->count() > 0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ route('employees.store') }}" method="post">
                                {{ csrf_field() }}
                                Name:
                                <br/>
                                <input type="text" name="name" value="{{ old('name') }}"/>
                                <br/><br/>
                                Email:
                                <br/>
                                <input type="text" name="email" value="{{ old('email') }}"/>
                                <br/><br/>
                                <input type="submit" value="Submit" class="btn btn-success"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection