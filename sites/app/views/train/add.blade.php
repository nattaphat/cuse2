@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{URL::route('trining_list')}}">หลักสูตรอบรม</a></li>
  <li class="active">เพิ่มหลักสูตรการอบรม</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
	{{ Form::open([
  "route" => array("trining_save",""),
  "id"=>"form-training-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">ชื่อหลักสูตรการอบรม*</label>
      <div class="col-lg-8">
        {{ Form::text("title",Input::old("title"),[
        "id"=>"title",
        "placeholder" => "ชื่อหลักสูตรการอบรม",
        "rows"=>"10",
        "cols"=>"2",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

 <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">รายละเอียด*</label>
      <div class="col-lg-8">
        {{ Form::textarea("description", Input::old("description"), [
          "id"=>"description",
          "placeholder" => "รายละเอียด",
          "class"=>"form-control",
          "rows"=>"10",
          "cols"=>"2",
      ]) }}
      </div>
    </div>

<div class="form-group">
  <label for="inputPassword1" class="col-lg-4 control-label">บทบาทเป้าหมาย*</label>
    @foreach (Roles::all() as $key =>$val)
    <div class="col-lg-offset-4 col-lg-8">
      <div class="checkbox">
        <label class="checkbox">
          {{ Form::checkbox('role_id[]', $val->id, false) }} {{ $val->role_name }}
        </label>      
      </div>
    </div>
    @endforeach
  </div>

<div class="form-group">
  <label for="inputPassword1" class="col-lg-4 control-label">สถานะหลักสูตร*</label>
    <div class=" col-lg-8">
      <div class="make-switch"  data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
        <input type="checkbox" name="status" checked="checked">
    </div>


    </div>
  </div>

<div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">ระยะเวลา ตั้งแต่-ถึง*</label>
      <div class="col-lg-3">
         <input type="text" class="form-control sdt" id="sdt" name="sdt" value="" placeholder="วันเวลาเริ่มต้น">         
      </div>
      <div class="col-lg-3">
        <input type="text" class="form-control edt" id="edt" name="edt" value="" placeholder="วันเวลาสุดท้าย">   
      </div>

    </div>

<div class="modal-footer">
      <button type="submit" class="btn btn-primary save-policy" >บันทึก</button>
      <!-- <button type="button" class="btn btn-primary save-policy" >Save Policy</button> -->
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop