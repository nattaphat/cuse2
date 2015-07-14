@extends('layouts.admin')

@section ('admincontent')
 
<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{ URL::to('policy-content' ) }}">นโยบายคลังฯ</a></li>
  <li class="active">แก้ไขนโยบายคลังฯ</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "url" => "policy-edit/$policy_result->id",
  "id"=>"form-policy-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">เนื้อหานโยบายคลังฯ</label>
      <div class="col-lg-8">
        {{ Form::textarea("policy-text", $policy_result->policy_content ,[
        "id"=>"policy-text",
        "placeholder" => "Poicy Content",
        "rows"=>"11",
        "cols"=>"2",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

 <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">ผู้สร้าง</label>
      <div class="col-lg-8">
        {{ Form::text("policy-author",$policy_result->author , [
          "id"=>"policy-author",
          "placeholder" => "Author",
          "class"=>"form-control"
      ]) }}
      </div>
    </div>
    
<div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">ผู้รับผิดชอบนโยบาย*</label>
      <div class="col-lg-8">
        <select id="policy_duty" name="policy_duty" class="form-control">
        @foreach ($policy_duty as $key => $val)
          <option value="{{$val->id}}" 
            @if($val->id == $policy_result->policy_duty)
                selected
            @endif
          >{{$val->fname.' '.$val->lastname.' : '.$val->position }}</option>
        @endforeach
        </select>
      </div>
    </div>

<div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">สถานะการใช้งานนโยบาย*</label>
    <!--{{ Form::checkbox('policy-status', '1', (($policy_result->status == 1) ? true: false) ) }} เปิดใช้งาน/อยู่ระหว่างพิจารณา -->
    <div class="make-switch"  data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
        <input type="checkbox" name="policy-status" 
          @if($policy_result->status) 
          checked="checked"
          @endif
        >
    </div>
  </div>


<div class="modal-footer">
      <a href="{{ URL::to('policy-del' ) }}/{{ $policy_result->id }}" class="btn btn-danger btn-md del-policy" onclick="return confirm('ท่านต้องการลบทิ้งนโยบายการใช้งานคลังฯ ใช่หรือไม่ ?')">ลบทิ้ง</a>
      <button type="submit" class="btn btn-primary save-policy" >บันทึกการเปลี่ยนแปลง</button>
      <!-- <button type="button" class="btn btn-primary save-policy" >Save Policy</button> -->
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop