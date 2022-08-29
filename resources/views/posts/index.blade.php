@extends('posts.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('create') }}"> Save</a>
            </div>
        </div>
    </div>
   
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Full Name</th>
            <th >Action</th>
            </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->first_name }}</td>
            <td>{{ \Str::limit($value->last_name, 100) }}</td>
            <td>{{ $value->name }}</td>
            <td>
                <form action="{{ url('destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ url('show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ url('edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you want delete ?')" href="{{ url('destroy') }}">Delete</button>
                    <!-- <a class=" " onclick="return confirm('Are you sure?')" href="{{ url('destroy') }}"><i class="fa fa-trash"></i></a> -->

                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection