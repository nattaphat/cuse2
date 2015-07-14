@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{ URL::to('policy-content' ) }}">นโยบายคลังฯ</a></li>
  <li class="active">เพิ่มนโยบายคลังฯ</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
	{{ Form::open([
  "route" => "policysave",
  "id"=>"form-policy-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">เนื้อหานโยบายคลังฯ*</label>
      <div class="col-lg-8">
        {{ Form::textarea("policy-text",Input::old("policy-text"),[
        "id"=>"policy-text",
        "placeholder" => "เนื้อหานโยบายคลังฯ",
        "rows"=>"10",
        "cols"=>"2",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

 <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">ผู้สร้าง*</label>
      <div class="col-lg-8">
        {{ Form::text("policy-author", Auth::User()->fname.' '.Auth::User()->lname, [
          "id"=>"policy-author",
          "placeholder" => "ผู้สร้างนโยบาย",
          "class"=>"form-control"
      ]) }}
      </div>
    </div>

  <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">ผู้รับผิดชอบนโยบาย*</label>
      <div class="col-lg-8">
        <select id="policy_duty" name="policy_duty" class="form-control">
        @foreach ($policy_duty as $key => $val)
          <option value="{{$val->id}}">{{$val->fname.' '.$val->lastname.' : '.$val->position }}</option>
        @endforeach
        </select>
      </div>
    </div>
<!--
<div class="form-group">
    <label for="inputPassword1" class="col-lg-3 control-label">สถานะนโยบาย*</label>
    {{ Form::checkbox('policy-status', '1', true) }} เปิดใช้งาน/ไม่ใช้งาน

  </div> -->

<div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">สถานะการใช้งานนโยบาย*</label>
    <div class="make-switch"  data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="policy-status" checked="checked">
                      </div>
  </div>

<div class="modal-footer">
      <button type="submit" class="btn btn-primary save-policy" >บันทึกนโยบายคลังฯ</button>
      <!-- <button type="button" class="btn btn-primary save-policy" >Save Policy</button> -->
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop