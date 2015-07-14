@extends('layouts.master')
@section ('container-login')
<br/>
<br/>

<div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="panel-heading">ข้อรหัสผ่านใหม่</div>
  <div class="panel-body">
    <p></p>
  </div>

  <ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach

  @if (Session::has('error'))
      {{ trans(Session::get('reason')) }}
  @elseif (Session::has('success'))
      ระบบได้ดำเนินการแล้ว กรุณาตรวจสอบอีเมล์
  @endif
  </ul>

  


{{ Form::open([
          "route" =>array('resetpwd', $token),
          "autocomplete" => "off",
          "class"=>"form-horizontal"
        ])}}
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">อีเมล์*</label>
    <div class="col-lg-4">
    	<input type="hidden" name="token" value="{{ $token }}">
      	{{ Form::email('emailremind',Input::old("emailremind"),[
        'class'=>'form-control',
        'placeholder'=>'user@somedoman.com'
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">รหัสผ่าน*</label>
    <div class="col-lg-4">
      	{{ Form::password('password',[
        'class'=>'form-control',
        'placeholder'=>'●●●●●●●●●●'
        ]) }}
    </div>
  </div>

	<div class="form-group">
	    <label for="inputEmail1" class="col-lg-2 control-label">ระบุรหัสผ่านอีกครั้ง*</label>
	    <div class="col-lg-4">
	      	{{ Form::password('password_confirmation',[
	        'class'=>'form-control',
	        'placeholder'=>'●●●●●●●●●●'
	        ]) }}
	    </div>
	</div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
  </div>
</form>
{{ Form::close() }}


</div>
@stop


@if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif