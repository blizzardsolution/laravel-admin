@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Add New company</div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            Name:
                            <br/>

                            <input type="text" name="name" value="{{ old('name') }}"/>
                            <br/><br/>
                            Address:
                            <br/>
                            <input type="text" name="address" value="{{ old('address') }}"/>
                            <br/><br/>


                            <label>Upload logo</label>
                            <input type="file" class="form-control-file" name="logo" onchange="loadFile(event)">
                            <img id="output" width="150" height="150"/>
                            <br/><br/>
                            <input type="submit" value="Submit" class="btn btn-success"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>