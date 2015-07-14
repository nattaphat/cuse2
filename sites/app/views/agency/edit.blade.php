@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{URL::route('actionshow')}}">การกระทำ</a></li>
  <li class="active">แก้ไขชื่อการกระทำ</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "url" => "action-edited/$action_result->id",
  "id"=>"form-action-editing",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">ชื่อการกระทำ*</label>
      <div class="col-lg-10">
        {{ Form::text("actionname",$action_result->action_name,[
        "id"=>"data-text",
        "placeholder" => "ชื่อการกระทำ",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

<div class="modal-footer">
      <a href="{{ URL::to('action-del' ) }}/{{ $action_result->id }}" class="btn btn-danger btn-md del-role" onclick="return confirm('ท่านต้องการลบทิ้งข้อมูลนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
      <button type="submit" class="btn btn-primary save-data" >บันทึกการเปลี่ยนแปลง</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop