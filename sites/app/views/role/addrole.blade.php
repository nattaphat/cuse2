@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{ URL::to('role' ) }}">บทบาท</a></li>
  <li class="active">เพิ่มชื่อบทบาท</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => "rolesave",
  "id"=>"form-policy-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">ชื่อบทบาท*</label>
      <div class="col-lg-10">
        {{ Form::text("rolename" ,Input::old("rolename"),[
        "id"=>"rolename",
        "placeholder" => "ชื่อบทบาท",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>
<div class="modal-footer">
      <button type="submit" class="btn btn-primary" >บันทึก</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop