@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{URL::route('trining_list')}}">หลักสูตรอบรม</a></li>
  <li class="active">แก้ไขหลักสูตรอบรม</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
	{{ Form::open([
  "route" => array("trining_save",$result->id),
  "id"=>"form-training-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal",
  "files"=>true
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">ชื่อหลักสูตร*</label>
      <div class="col-lg-8">
        {{ Form::text("title",$result->title,[
        "id"=>"title",
        "placeholder" => "ชื่อหลักสูตร",
        "rows"=>"10",
        "cols"=>"2",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

 <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">รายละเอียด*</label>
      <div class="col-lg-8">
        {{ Form::textarea("description", $result->description, [
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
    @foreach ($roles as $key => $val)
      <div class="col-lg-offset-4 col-lg-8">
      <div class="checkbox">
        <label class="checkbox">
          {{ Form::checkbox('role_id[]', $val->id, (in_array($val->id, $arr_target)) ) }} {{$val->role_name}}
        </label>      
      </div>
      </div>
      
    @endforeach

  </div>

<div class="form-group">
  <label for="inputPassword1" class="col-lg-4 control-label">สถานะหลักสูตร*</label>
    <div class=" col-lg-8">
      <div class="make-switch"  data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
        <input type="checkbox" name="status" 
          @if($result->status) 
          checked="checked"
          @endif
        >
    </div>


    </div>
  </div>
<div class="form-group">
        <label for="inputPassword1" class="col-lg-4 control-label">เอกสารแนบ</label>
        <div class=" col-lg-8">
            {{
            Form::file('training_upload[]',["multiple"=>"true","id"=>"training_upload"]);
            }}
            {{--<input id="training_upload" type="file" multiple="true">--}}

        </div>
 </div>
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">ระยะเวลา ตั้งแต่-ถึง*</label>
      <div class="col-lg-3">
         <input type="text" class="form-control sdt" id="sdt" name="sdt" value="{{ Carbon::createFromTimeStamp(strtotime($result->start_training_date))->format('Y-m-d H:i') }}" placeholder="Start Datetime">         
      </div>
      <div class="col-lg-3">
        <input type="text" class="form-control edt" id="edt" name="edt" value="{{ Carbon::createFromTimeStamp(strtotime($result->closed_date))->format('Y-m-d H:i') }}" placeholder="Start Datetime">   
      </div>

    </div>

<div class="modal-footer">
      <button type="submit" class="btn btn-primary save-policy" >บันทึก</button>
      <a href="{{ URL::to('/training/del' ) }}/{{ $result->id }}" class="btn btn-danger" onclick="return confirm('ท่านต้องการลบหลักสูตรอบรมนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop