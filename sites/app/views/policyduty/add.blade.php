@extends('layouts.admin')

@section ('admincontent')

  <ol class="breadcrumb">
    <li class="active">รายการผู้ใช้งาน</li>
    <li class="active"><a href="{{URL::to('policyduty/list')}}">ผู้รับผิดชอบนโยบาย</a></li>
    <li class="active">เพิ่มผู้รับผิดชอบนโยบาย </li>
  </ol>
  
  <div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงเพิ่มผู้รับผิดชอบนโยบาย</div>
  <div class="panel-body">
    <p></p>
  </div>

  <form class="form-horizontal" role="form" method = "post" action={{ route('policyduty_save') }}>
    {{ Form::token() }}
    <ul class="errors">
          @foreach($errors->all('<li>:message</li>') as $message)
            {{ $message }}
          @endforeach
          </ul>
    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">ชื่อผู้รับผิดชอบ*</label>
      <div class="col-lg-4">
          {{ Form::text("dutyname", Input::old("dutyname"), [
              "id"=>"dutyname",
              "placeholder" => "ชื่อผู้รับผิดชอบ",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">นามสกุล*</label>
      <div class="col-lg-4">
        {{ Form::text("dutylname", Input::old("dutylname"), [
              "id"=>"dutylname",
              "placeholder" => "นามสกุล",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">ตำแหน่ง*</label>
      <div class="col-lg-4">
        {{ Form::text("dutyrole", Input::old("dutyrole"), [
              "id"=>"dutyrole",
              "placeholder" => "ตำแหน่ง",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">เบอร์ติดต่อ*</label>
      <div class="col-lg-4">
        {{ Form::text("dutytelno", Input::old("dutytelno"), [
              "id"=>"dutytelno",
              "placeholder" => "02-1234567 Ext. 890",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">อีเมล*</label>
      <div class="col-lg-4">
        {{ Form::email("dutyemail", Input::old("dutyemail"), [
              "id"=>"dutyemail",
              "placeholder" => "user@somedoman.com",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">ประเภทความรับผิดชอบ*</label>
      <div class="col-lg-4">
        {{
            Form::select('duty_type', $duty_type, '1',["class"=>'form-control']);
        }}
      </div>
    </div>

    <div class="form-group">
        <div class="controls col-lg-offset-3 form-inline">
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
  </form>

  </div>
@stop