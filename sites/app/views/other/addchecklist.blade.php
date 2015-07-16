@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
    <li><a href="{{ URL::to('other') }}">เอกสารเผยแพร่</a></li>
  <li class="active">เพิ่มรายการเอกสาร</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => "chklist_save",
  "id"=>"form-chklist-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อรายการเอกสาร*</label>
      <div class="col-lg-9">
        {{ Form::text("chkname_th" ,Input::old('chkname_th'),[
        "id"=>"chkname_th",
        "placeholder" => "ชื่อรายการเอกสาร ภาษาไทย",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

     <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อรายการเอกสาร*</label>
      <div class="col-lg-9">
        {{ Form::text("chkname_en" ,Input::old('chkname_en'),[
        "id"=>"chkname_en",
        "placeholder" => "ชื่อรายการเอกสาร ภาษาอังกฤษ",
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