@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{URL::route('conditionshow')}}">เงื่อนไข</a></li>
  <li class="active">แก้ไขชื่อเงื่อนไข</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "url" => "condition-edited/$condition_result->id",
  "id"=>"form-condition-editing",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อเงื่อนไข*</label>
      <div class="col-lg-9">
        {{ Form::text("conditionname",$condition_result->cond_name,[
        "id"=>"conditionname",
        "placeholder" => "ชื่อเงื่อนไข",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">เงื่อนไขค้นหา</label>
      <div class="col-lg-9">
        {{ Form::text("condition_action",$condition_result->condition,[
        "id"=>"condition_action",
        "placeholder" => "Condition",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

<div class="modal-footer">
      <a href="{{ URL::to('condition-del' ) }}/{{ $condition_result->id }}" class="btn btn-danger btn-md del-role" onclick="return confirm('ท่านต้องการลบทิ้งชื่อเงื่อนไขใช่หรือไม ?')">ลบทิ้ง</a>
      <button type="submit" class="btn btn-primary save-data" >บันทึกการเปลี่ยนแปลง</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop