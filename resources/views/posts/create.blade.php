@extends('posts.layout')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Save Users</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('index') }}"> Back</a>
        </div>
    </div>
</div>

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<form action="{{ url('store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name First:</strong>
                <input type="text" style="width :300px" name="first_name" class="form-control fname" placeholder="First Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                  
                <input class="form-control lname" style="width:300px" name="last_name" placeholder="Last Name">
            </div>
        </div>

        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label class="fullname"></label>
                <input class="form-control fullname" style="width:300px" name="name" style="border:0"/>
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
<script>
    $(document).ready(function() {
        $(".lname").on('change', function() {
            var firstname = $('.fname').val();
            console.log(firstname);
            var secondname = $('.lname').val();
            console.log(secondname);

            var Fullname = firstname.concat(secondname.toString());
            console.log("firstname + secondname : " + Fullname)
            $('.fullname').val(Fullname);
        })
    });
</script>
@endsection