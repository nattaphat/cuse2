@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{URL::route('conditionshow')}}">เงื่อนไข</a></li>
  <li class="active">เพิ่มชื่อเงื่อนไข</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => "conditionsave",
  "id"=>"form-condition-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อเงื่อนไข*</label>
      <div class="col-lg-9">
        {{ Form::text("conditionname" ,Input::old("conditionname"),[
        "id"=>"actionname",
        "placeholder" => "ชื่อเงื่อนไข",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">เงื่อนไขค้นหา</label>
      <div class="col-lg-9">
        {{ Form::text("condition_action",Input::old("condition_action"),[
        "id"=>"condition_action",
        "placeholder" => "Ex. limit 100 offset 0",
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