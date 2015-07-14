@extends('layouts.admin')

@section ('admincontent')

  <ol class="breadcrumb">
    <li class="active">รายการผู้ใช้งาน</li>
    <li class="active"><a href="{{URL::to('policyduty/list')}}">ผู้รับผิดชอบนโยบาย</a></li>
    <li class="active">แก้ไขผู้รับผิดชอบนโยบาย </li>
  </ol>
  
  <div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงแก้ไขผู้รับผิดชอบนโยบาย</div>
  <div class="panel-body">
    <p></p>
  </div>

  {{ Form::open([
    "url" => "policyduty/edited/$rs->id",
    "id"=>"form-data-editing",
    "autocomplete" => "off",
    "class"=>"form-horizontal"
  ])}}

    <ul class="errors">
          @foreach($errors->all('<li>:message</li>') as $message)
            {{ $message }}
          @endforeach
          </ul>
    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">ชื่อผู้รับผิดชอบ*</label>
      <div class="col-lg-4">
          {{ Form::text("dutyname", $rs->fname, [
              "id"=>"dutyname",
              "placeholder" => "ชื่อผู้รับผิดชอบ",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">นามสกุล*</label>
      <div class="col-lg-4">
        {{ Form::text("dutylname", $rs->lastname, [
              "id"=>"dutylname",
              "placeholder" => "นามสกุล",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">ตำแหน่ง*</label>
      <div class="col-lg-4">
        {{ Form::text("dutyrole", $rs->position, [
              "id"=>"dutyrole",
              "placeholder" => "ตำแหน่ง",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-2 control-label">เบอร์ติดต่อ*</label>
      <div class="col-lg-4">
        {{ Form::text("dutytelno", $rs->tel, [
              "id"=>"dutytelno",
              "placeholder" => "02-1234567 Ext. 890",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">อีเมล*</label>
      <div class="col-lg-4">
        {{ Form::email("dutyemail", $rs->email, [
              "id"=>"dutyemail",
              "disabled"=>"true",
              "placeholder" => "user@somedoman.com",
              "class"=>"form-control"
          ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">สถานะ*</label>
      <div class="col-lg-4">
        {{ 
          Form::select('status', 
                        array(
                          '' => '-- เลือก --',
                          'true' => 'เปิดใช้งาน', 
                          'false' => 'ระงับใช้งาน'
                        ), 
                        'false',
                        array("class"=>"form-control")
                      )
        }}
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
          <a href="{{ URL::to('policyduty/del' ) }}/{{ $rs->id }}" class="btn btn-danger btn-md del-role" onclick="return confirm('ท่านต้องการลบทิ้งใช่หรือไม่ ?')">ลบทิ้ง</a>
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
  </form>

  </div>
@stop