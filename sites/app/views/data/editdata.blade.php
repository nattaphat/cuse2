@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{ URL::to('data' ) }}">ข้อมูล</a></li>
  <li class="active">แก้ไขชื่อข้อมูล</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
<div class="col-lg-8">
  {{ Form::open([
  "url" => "data-edited/$data_result->id",
  "id"=>"form-data-editing",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
  ])}}
    
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">ชื่อข้อมูล</label>
    <div class="col-lg-10">
      {{ Form::text("dataname",$data_result->data_name,[
      "id"=>"data-text",
      "placeholder" => "ระบุชื่อข้อมูล",
      "class"=>"form-control"
      ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">ชื่อตาราง*</label>
    <div class="col-lg-10">
      {{ Form::text("table_name" ,$data_result->table_name,[
      "id"=>"table_name",
      "placeholder" => "ชื่อตาราง-ฟิลด์ข้อมูล-ฟิลด์วันที่ ตัวอย่างเช่น rainfall_sumary-rainfall24h-rainfall24h_date",
      "class"=>"form-control"
    ]) }}
    </div>
  </div>
  
  <div class="modal-footer">
        <a href="{{ URL::to('data-del' ) }}/{{ $data_result->id }}" class="btn btn-danger btn-md del-role" onclick="return confirm('ท่านต้องการลบชื่อข้อมูลนี้ใช้หรือไม่ ?')">ลบทิ้ง</a>
        <button type="submit" class="btn btn-primary save-data" >บันทึกการเปลี่ยนแปลง</button>
  </div>

  {{ Form::close() }}
</div><!--/col-lg-12-->

@stop