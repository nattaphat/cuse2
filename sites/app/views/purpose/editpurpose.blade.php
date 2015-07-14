@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{URL::route('purposeshow')}}">วัตถุประสงค์</a></li>
  <li class="active">แก้ไขวัตถุประสงค์</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "url" => "purpose-edited/$purpose_result->id",
  "id"=>"form-purpose-editing",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อวัตถุประสงค์</label>
      <div class="col-lg-9">
        {{ Form::text("purpose_name",$purpose_result->purp_name,[
        "id"=>"purpose_name",
        "placeholder" => "Purpose Name",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

<div class="modal-footer">
      <a href="{{ URL::to('purpose-del' ) }}/{{ $purpose_result->id }}" class="btn btn-danger btn-md del-role" onclick="return confirm('ท่านต้องการลบทิ้งวัตถุประสงค์ใช่หรือไม่ ?')">ลบทิ้ง</a>
      <button type="submit" class="btn btn-primary save-data" >บันทึกการเปลี่ยนแปลง</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop