@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        ADMIN Panel

        @if ($message = Session::get('success'))
            <div class="alert alert-success my-2">
                {{$message}}
            </div>
            <script>
            toastr.options =
            {
  	        "closeButton" : true,
        	"progressBar" : true
            }
  		toastr.success("{{$message}}");

          </script>
            @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>CID</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            @if($data)
            @foreach ($data as $key => $value)
            <tr>
            <td>{{++$i}}</td>
            <td>{{$value->username}}</td>
            <td>{{$value->fname}}</td>
            <td>{{$value->lname}}</td>
            <td>{{$value->cid}}</td>
            <td>{{$value->phone_number}}</td>
            <td>{{$value->email}}</td>    
            <td>{{$value->level}}</td>
            <td>

                <form method="POST" action="{{ url('/userview' . '/' .$value->id) }}">
                <a href="{{ route('userview.edit', $value->id)}}"class="btn btn-primary my-1">Edit</a>    
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                
                <button type="submit" title="Delete Post" class="btn btn-danger">Delete</button>
                </form>

            </td>
            </tr>
            @endforeach
            @endif
            </table>   
           
           
            <div class="col-md12">
            <a href="{{route('userview.create')}}" class="btn btn-success my-3">Create New User</a>
            <a href="{{ route('goback.index') }}" class = "btn btn-primary">Back</a>
</div>


    </div>
</div>
@endsection
