@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Koreguoti įrašą</div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('employees.update', $employees->id) }}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            Name:
                            <br/>
                            <input type="text" name="name" value="{{  $employees->name }}"/>
                            <br/><br/>
                            Email:
                            <br/>
                            <input type="text" name="email" value="{{  $employees->email }}"/>
                            <br/><br/>
                            <input type="submit" value="Išsaugoti" class="btn btn-danger"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection