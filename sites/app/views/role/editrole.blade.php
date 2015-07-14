@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{ URL::to('role' ) }}">บทบาท</a></li>
  <li class="active">แก้ไขชื่อบทบาท</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "url" => "role-edited/$role_result->id",
  "id"=>"form-role-editing",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">ชื่อบทบาท</label>
      <div class="col-lg-10">
        {{ Form::text("rolename",$role_result->role_name,[
        "id"=>"policy-text",
        "placeholder" => "ชื่อบทบาท",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

<div class="modal-footer">
      <a href="{{ URL::to('role-del' ) }}/{{ $role_result->id }}" class="btn btn-danger btn-md del-role" onclick="return confirm('ท่านต้องการลบทิ้งชื่อบทบาทนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
      <button type="submit" class="btn btn-primary save-policy" >บันทึกการเปลี่ยนแปลง</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop