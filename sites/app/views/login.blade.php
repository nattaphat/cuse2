@extends('layouts.master')

@section ('head')
  @parent
  <!-- Custom styles for this template -->
  <link href="packages/bootstrap3/css/signin.css" rel="stylesheet">
@stop

@section ('container-login')
	<div class="container">

      {{ Form::open([
          "route" => "loginaction",
          "autocomplete" => "off",
          "class"=>"form-signin"
        ])}}
        <ul class="errors">
        @foreach($errors->all('<li>:message</li>') as $message)
          {{ $message }}
        @endforeach
        </ul>
        <h3 class="form-signin-heading text-center">ระบบคลังสารสนเทศกลาง<br />ทรัพยากรน้ำ (กรณีศึกษา)</h3>

        {{ Form::text("username", Input::old("username"), [
            "id"=>"username",
            "placeholder" => "ชื่อผู้ใช้",
            "class"=>"form-control"
        ]) }}

        {{ Form::password("password", [
            "id"=>"password",
            "placeholder" => "●●●●●●●●●●",
            "class"=>"form-control"
        ]) }}
        <label class="checkbox">
          <a href="{{ URL::to('register') }}" class="btn btn-link">ลงทะเบียน</a>
          <a href="{{ URL::to('resetpassword') }}" class="btn btn-link">ลืมรหัสผ่าน ?</a>
        </label>        
        {{ Form::button('เข้าสู่ระบบ',array('type'=>'submit','class'=>"btn btn-lg btn-primary btn-block")) }}
      {{ Form::close() }}

      <!-- <form class="form-signin" action="{{ url('loginaction') }}" method="POST">
        <ul class="errors">
        @foreach($errors->all('<li>:message</li>') as $message)
          {{ $message }}
        @endforeach
        </ul>
        <h3 class="form-signin-heading">NHC-Backoffice sign in</h3>
        <input type="text" id="username" class="form-control" placeholder="Username" autofocus>
        <input type="password" id="password" class="form-control" placeholder="●●●●●●●●●●">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
          <a href="http://www.nhc.in.th/laravel/public/myadmin/users/resetpassword" class="btn btn-link">Forgot Password?</a>
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form> -->

    </div> <!-- /container -->
@stop