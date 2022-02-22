@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h5 style="text-align:center">ข้อมูลสิทธิบัตร</h5>
        <br>
        <table class="table table-bordered my-2">
            <tr>
                <th>ID</th>
                <th>Hn</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>วันเกิด</th>
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
            </tr>
            
            @foreach ($data as $key => $value)
            <tr>
            <td>{{++$i}}</td>
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
            <td>{{$value->sex}}</td>
            <td>{{$value->cid}}</td>
            <td>{{$value->drugallergy}}</td>
            <td>{{$value->status}}</td>
            </tr>
            @endforeach
           
            </table>  
           
            @if ($is_admin == 1)
            
            <hr class="my-3">
           <div class="col-md12">

           <a href="{{ url('/admin/home') }}" class = "btn btn-success my-2">Edit Patient</a>
           <a href="{{ route('userview.index') }}" class = "btn btn-success">Edit User</a>
           </div>
            @endif

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
            @endif

    </div>
</div>
@endsection
