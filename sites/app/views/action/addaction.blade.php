@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{URL::route('actionshow')}}">การกระทำ</a></li>
  <li class="active">เพิ่มชื่อการกระทำ</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => "action_save",
  "id"=>"form-action-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">ชื่อการกระทำ*</label>
      <div class="col-lg-10">
        {{ Form::text("actionname" ,Input::old('actionname'),[
        "id"=>"actionname",
        "placeholder" => "ชื่อการกระทำ",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>
<div class="modal-footer">
      <button type="submit" class="btn btn-primary" >บันทึกการกระทำ</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop