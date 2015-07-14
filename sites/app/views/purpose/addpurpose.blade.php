@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{URL::route('purposeshow')}}">วัตถุประสงค์</a></li>
  <li class="active">เพิ่มชื่อวัตถุประสงค์</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => "purposesave",
  "id"=>"form-purpose-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อวัตถุประสงค์*</label>
      <div class="col-lg-9">
        {{ Form::text("purpose_name" ,Input::old("purpose_name"),[
        "id"=>"purpose_name",
        "placeholder" => "ชื่อวัตถุประสงค์",
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