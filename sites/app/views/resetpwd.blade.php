@extends('layouts.master')
@section ('container-login')
<br/>
<br/>

<div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="panel-heading">ขอรหัสผ่านใหม่</div>
  <div class="panel-body">
    <p></p>
  </div>

  <ul class="errors">
  @foreach ($errors->get('emailremind') as $message)
      <li>{{ $message }}</li>
  @endforeach
  </ul>

  @if (Session::has('error'))
      {{ trans(Session::get('reason')) }}
  @elseif (Session::has('success'))
      ระบบได้ดำเนินการแล้ว กรุณาตรวจสอบอีเมล์
  @endif


{{ Form::open([
          "route" => "pwdremind",
          "autocomplete" => "off",
          "class"=>"form-horizontal"
        ])}}
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">อีเมล์*</label>
    <div class="col-lg-4">
      {{ Form::email('emailremind',Input::old("emailremind"),[

        'class'=>'form-control',
        'placeholder'=>'user@somedoman.com'
        ]) }}
    </div>
  </div>
  <div class="form-group">
      <div class="controls col-lg-offset-3 form-inline">
          <button type="submit" class="btn btn-primary">กู้รหัสผ่าน</button>
          <a href="{{ URL::to('login' ) }}" class="btn btn-primary">เข้าสู่ระบบ</a>
      </div>
  </div>
</form>
{{ Form::close() }}


</div>
@stop
