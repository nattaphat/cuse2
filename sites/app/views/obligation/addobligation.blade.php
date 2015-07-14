@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{ URL::route('obligationshow') }}">ข้อผูกพัน</a></li>
  <li class="active">เพิ่มชื่อข้อผูกพัน</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => "obligationsave",
  "id"=>"form-obligation-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อข้อผูกพัน*</label>
      <div class="col-lg-8">
        {{ Form::text("obligationname" ,Input::old("obligationname"),[
        "id"=>"obligationname",
        "placeholder" => "ชื่อข้อผูกพัน",
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