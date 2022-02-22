@extends('layouts.app')

@section('content')

    <!-- datepicker -->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

<div class="container"  >
    <div class="row justify-content-center">
    <div class="row mt-1">

</div>
@if($errors->any())
<div class="alert alert-denger">

    @foreach($errors->all() as $error)
    <script>
            toastr.options =
            {
  	        "closeButton" : true,
        	"progressBar" : true
            }
  		toastr.error("{{$error}}");

          </script>
    


    @endforeach
</div>
@endif

<form action="{{route('posts.update',$post->id)}}" method = "post">
@csrf
@method('PUT')


<div class="container" style="width:800px">
<div class="card" style="width: 100%;">
<div class="card-body">
<div class="col-md-12"  style="text-align:center">
    <h3>Patient Editor</h3>
    
    </div>
<div class="row mt-4" style="width:1250px">
<div class="col-sm-2 my-1" >
<strong>Hn</strong>
<input type="text" name="hn" value="{{$post->hn}}" class="form-control" placeholder="Enter hn" style="width:200px">
</div>
<div class="col-sm-1 my-1"> 
<strong>คำนำหน้า</strong>
        @if($post->pname == "นาย")
        <select name="pname" class="form-select" aria-label="Default select example" style="width:80px">
        <option selected="selected" value="1">นาย</option>
        <option value="2">นาง</option>
        <option value="3">น.ส.</option>
        </select>    
        @elseif($post->pname == "นาง")
        <select name="pname" class="form-select" aria-label="Default select example" style="width:80px">
        <option  value="1">นาย</option>
        <option selected="selected" value="2">นาง</option>
        <option value="3">น.ส.</option>
        </select> 
        @else
        <select name="pname" class="form-select" aria-label="Default select example" style="width:80px">
        <option  value="1">นาย</option>
        <option  value="2">นาง</option>
        <option selected="selected" value="3">น.ส.</option>
        </select> 
        @endif
    </div>
    <div class="col-sm-2 my-1">
    <div class="form-group">
        <strong>ชื่อ</strong>
        <input type="text" name="fname" value="{{$post->fname}}" class="form-control" placeholder="ชื่อ" style="text-align:centerr">
    </div>
</div>
<div class="col-sm-2 my-1">
    <div class="form-group">
        <strong>นามสกุล</strong>
        <input type="text" name="lname" value="{{$post->lname}}" class="form-control" placeholder="นามสกุล">
    </div>
</div>
</div>
<div class="row mt-1" style="width:1250px">
<div class="col-sm-2 my-1">
    <div class="form-group">
        <strong>วันเกิด</strong>
        
        <input name="birthday" value="{{$post->birthday}}" id="datepicker" autocomplete="off"/>
        <script type="text/javascript">
       $(function() {
               $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
   </script>

    </div>
</div>
<div class="col-sm-1 my-1">
    <div class="form-group">
        <strong>บ้านเลขที่</strong>
        <input type="text" name="addpart" value="{{$post->addpart}}" class="form-control" placeholder="บ้านเลขที่">
    </div>
</div>
<div class="col-sm-1 my-1">
    <div class="form-group">
        <strong>หมู่</strong>
        <input type="text" name="moopart" value="{{$post->moopart}}" class="form-control" placeholder="หมู่">
    </div>
</div>
<div class="col-sm-1 my-1">
    <div class="form-group">
        <strong>ตำบล</strong>
        <input type="text" name="tmbpart" value="{{$post->tmbpart}}" class="form-control" placeholder="ตำบล">
    </div>
</div>
<div class="col-sm-2 my-1">
    <div class="form-group">
        <strong>อำเภอ</strong>
        <input type="text" name="amppart" value="{{$post->amppart}}" class="form-control" placeholder="อำเภอ">
    </div>
</div>
</div>
<div class="row mt-1" style="width:1250px">
<div class="col-sm-2 my-1">
    <div class="form-group">
        <strong>จังหวัด</strong>
        <input type="text" name="chwpart" value="{{$post->chwpart}}" class="form-control" placeholder="จังหวัด">
    </div>
</div>
<div class="col-sm-2 my-1">
    <div class="form-group">
        <strong>เบอร์โทรศัพท์</strong>
        <input type="text" name="hometel" value="{{$post->hometel}}" class="form-control" placeholder="เบอร์โทรศัพท์">
    </div>
</div>
<div class="col-sm-1 my-1">
    <div class="form-group">
        <strong>เพศ</strong>
        @if($post->sex == "ชาย")
        <select name="sex" class="form-select" aria-label="Default select example" style="width:80px">
        <option selected="selected" value="1">ชาย</option>
        <option value="2">หญิง</option>
        </select>    
        @else
        <select name="sex" class="form-select" aria-label="Default select example" style="width:80px">
        <option  value="1">ชาย</option>
        <option selected="selected" value="2">หญิง</option>
        </select>    
        @endif
    </div>
</div>
<div class="col-sm-2 my-1">
    <div class="form-group">
        <strong>เลขบัตรประชาชน</strong>
        <input type="text" name="cid" value="{{$post->cid}}" class="form-control" placeholder="เลขบัตรประชาชน">
    </div>
</div>
</div>
<div class="row mt-1" style="width:1250px">
<div class="col-sm-6 my-1">
    <div class="form-group">
        <strong>การแพ้ยา</strong>
        <input type="text" name="drugallergy" value="{{$post->drugallergy}}" class="form-control" placeholder="การแพ้ยา">
    </div>
</div>
<div class="col-sm-1 my-1">
    <div class="form-group">
        <strong>สถานะ</strong>
        <input type="text" name="status" value="{{$post->status}}" class="form-control" placeholder="สถานะ">
    </div>
</div>
</div>
<div class="row mt-1" style="width:1250px;text-align:center">
<div class="col-sm-7 my-1">
<a href="{{ route('posts.index') }}" class = "btn btn-primary">Back</a>
    <button type="submit" class="btn btn-success my-1">Edit</button>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection