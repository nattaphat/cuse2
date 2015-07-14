@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">ไพรเวซีเริ่มต้น</li>
  <li class="active">เพิ่มไพรเวซีเริ่มต้น</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
    "route" => "privacy_save",
    "id"=>"form-privacyinit-adding",
    "autocomplete" => "off",
    "class"=>"form-horizontal"
  ])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อภาษาไทย*</label>
      <div class="col-lg-9">
        {{ Form::text("name_th" ,Input::old("name_th"),[
        "id"=>"purpose_name",
        "placeholder" => "ชื่อภาษาไทย",
        "class"=>"form-control"
      ]) }}
      </div>
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อภาษาอังกฤษ*</label>
      <div class="col-lg-9">
        {{ Form::text("name_en" ,Input::old("name_en"),[
        "id"=>"purpose_name",
        "placeholder" => "ชื่อภาษาอังกฤษ",
        "class"=>"form-control"
      ]) }}
      </div>
      <label for="inputEmail1" class="col-lg-3 control-label">ค่าเริ่มต้น*</label>
      <div class="col-lg-9">
        {{
          Form::select('init_val', array(false => 'ปิด', true => 'เปิด'), false);
        }}
      </div>
    </div>
<div class="modal-footer">
      <button type="submit" class="btn btn-primary" >บันทึก</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop