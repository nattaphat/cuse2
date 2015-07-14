@extends('layouts.master')
@section ('container-login')
<br/>
<br/>

<div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงลงทะเบียนผู้ใช้งาน</div>
  <div class="panel-body">
    <p></p>
  </div>

<form class="form-horizontal" role="form" method = "post" action={{ route('regisaction') }}>
	{{ Form::token() }}
  {{ Form::hidden("status", 'no') }}
  {{ Form::hidden("grp_id", '3') }}
  <ul class="errors">
        @foreach($errors->all('<li>:message</li>') as $message)
          {{ $message }}
        @endforeach
        </ul>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">*ชื่อผู้ใช้งาน</label>
    <div class="col-lg-4">
        {{ Form::text("fname", Input::old("fname"), [
            "id"=>"fname",
            "placeholder" => "John",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">นามสกุล</label>
    <div class="col-lg-4">
      {{ Form::text("lname", Input::old("lname"), [
            "id"=>"lname",
            "placeholder" => "C.",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">เบอร์ติดต่อ</label>
    <div class="col-lg-4">
      {{ Form::text("telno", Input::old("telno"), [
            "id"=>"telno",
            "placeholder" => "02-1234567 Ext. 890",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">*หน่วยงานสังกัด</label>
    <div class="col-lg-6">
	    <select class="form-control" name="agency_id">
	    	<!-- <option value=""> Choose Agency </option> -->
	    	@foreach ($agency as $ag)
			<option value="{{ $ag->id }}">{{ $ag->tname }}</option>
			@endforeach
		</select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">*อีเมล์</label>
    <div class="col-lg-4">
      {{ Form::email("email", Input::old("email"), [
            "id"=>"email",
            "placeholder" => "user@somedoman.com",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">*ชื่อผู้ใช้งาน</label>
    <div class="col-lg-4">
      {{ Form::text("username", Input::old("username"), [
            "id"=>"username",
            "placeholder" => "Username",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">*รหัสผ่าน</label>
    <div class="col-lg-4">
      
      {{ Form::password("password", [
            "id"=>"password",
            "placeholder" => "●●●●●●●●●●",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">*ระบุรหัสผ่านอีกครั้ง</label>
    <div class="col-lg-4">
      {{ Form::password("password_confirmation", [
            "id"=>"password_confirmation",
            "placeholder" => "●●●●●●●●●●",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
      <div class="controls col-lg-offset-3 form-inline">
          <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
          <a href="{{ URL::to('login' ) }}" class="btn btn-primary">เข้าสู่ระบบ</a>
      </div>
  </div>
</form>

</div>
@stop
