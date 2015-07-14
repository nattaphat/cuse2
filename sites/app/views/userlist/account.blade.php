@extends('layouts.admin')

@section ('admincontent')
 
<ol class="breadcrumb">
  <li><a href="{{ URL::route('policy')}}">หน้าหลัก</a></li>
  <li class="active">บัญชีผู้ใช้</li>
</ol>
 <div class="col-lg-12">
    <div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงบัญชีผู้ใช้</div>
  <div class="panel-body">
    <p></p>
  </div>

  {{ Form::open([
    "route" => array("useraccount_save", $userinfo->user_id),
    "id"=>"form-accountsave",
    "autocomplete" => "off",
    "class"=>"form-horizontal"
  ])}}
  <ul class="errors">
    @foreach($errors->all('<li>:message</li>') as $message)
      {{ $message }}
    @endforeach
  </ul>
  {{ Form::token() }}
  {{ Form::hidden("status", $userinfo->user_status) }}
  {{ Form::hidden("grp_id", $userinfo->grp_id) }}
  {{ Form::hidden("user_id", $userinfo->user_id) }}
  <ul class="errors">
    @foreach($errors->all('<li>:message</li>') as $message)
      {{ $message }}
    @endforeach
    </ul>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">ชื่อผู้ใช้งาน*</label>
    <div class="col-lg-4">
        {{ Form::text("fname", $userinfo->fname, [
            "id"=>"fname",
            "placeholder" => "John",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">นามสกุล</label>
    <div class="col-lg-4">
      {{ Form::text("lname", $userinfo->lname, [
            "id"=>"lname",
            "placeholder" => "C.",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">เบอร์โทรติดต่อ</label>
    <div class="col-lg-4">
      {{ Form::text("telno", $userinfo->telno, [
            "id"=>"telno",
            "placeholder" => "02-1234567 Ext. 890",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">หน่วยงนสังกัด*</label>
    <div class="col-lg-6">
      <select class="form-control" name="agency_id">
        <!-- <option value="">-- Choose Agency --</option> -->
        @foreach ($agency as $ag)
      <option value="{{ $ag->id }}"
        @if($userinfo->agency_id == $ag->id)
          selected="selected"
        @endif
        >{{ $ag->tname }}</option>
      @endforeach
    </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">อีเมล์*</label>
    <div class="col-lg-4">
      {{ Form::email("email", $userinfo->email , [
            "id"=>"email",
            "placeholder" => "user@somedoman.com",
            "class"=>"form-control"
        ]) }}
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
    </div>
  </div>
{{ Form::close() }}

</div>
 </div><!--/col-lg-12-->

@stop