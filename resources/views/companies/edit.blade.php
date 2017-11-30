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
                        <form action="{{ route('companies.update', $companies->id) }}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            Name:
                            <br/>
                            <input type="text" name="name" value="{{  $companies->name }}"/>
                            <br/><br/>
                            Email:
                            <br/>
                            <input type="text" name="email" value="{{  $companies->address }}"/>
                            <br/><br/>
                            Logo:
                            <br/>
                            <div class="form-group">
                                <label>Upload new logo</label>
                                <input type="file" class="form-control-file" name="logo" onchange="loadFile(event)">
                                <img id="output" width="150" height="150"/>
                            </div>
                            <br/><br/>
                            <input type="submit" value="Išsaugoti" class="btn btn-danger"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection