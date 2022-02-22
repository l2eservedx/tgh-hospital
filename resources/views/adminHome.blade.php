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
                <th>Hn</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th width = "130px">วันเกิด</th>
                <th>บ้านเลขที่</th>
                <th>หมู่</th>
                <th>ตำบล</th>
                <th>อำเภอ</th>
                <th>จังหวัด</th>
                <th>เบอร์โทร</th>
                <th>เพศ</th>
                <th>เลขบัตรประชาชน</th>
                <th>การแพ้ยา</th>
                <th>สถานะบุคคล</th>
                <th width = "145px">Action</th>
            </tr>
            @if($data)
            @foreach ($data as $key => $value)
            <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->hn}}</td>
            <td>{{$value->pname}}</td>
            <td>{{$value->fname}}</td>
            <td>{{$value->lname}}</td>
            <td>{{$value->birthday}}</td>
            <td>{{$value->addpart}}</td>
            <td>{{$value->moopart}}</td>    
            <td>{{$value->tmbpart}}</td>
            <td>{{$value->amppart}}</td>
            <td>{{$value->chwpart}}</td>
            <td>{{$value->hometel}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->cid}}</td>
            <td>{{$value->drugallergy}}</td>
            <td>{{$value->status}}</td>
            <td>

                <form method="POST" action="{{ url('/posts' . '/' .$value->id) }}">
                <a href="{{ route('posts.edit', $value->id)}}"class="btn btn-primary my-1">Edit</a>    
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
            <a href="{{route('posts.create')}}" class="btn btn-success my-3">Create New Patient</a>
            <a href="{{ route('goback.index') }}" class = "btn btn-primary">Back</a>
            
</div>


    </div>
</div>
@endsection
