@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">ผู้ใช้และหน่วยงาน</li>
  <li><a href="{{URL::route('agency')}}">หน่วยงาน</a></li>
  <li class="active">เพิ่มหน่วยงาน</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => array("agency_add","save"),
  "id"=>"form-action-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">กระทรวง*</label>
      <div class="col-lg-6">
      <input type="hidden" id="url_getdepartment" value="{{URL::to('/agency/department/')}}">
      <select id="ministry_id" name="ministry_id" class="form-control">
        <option value="">- เลือก -</option>
      <? foreach ($ministry_list as $key => $value) {?>
        <option value="{{$value['ministry_id']}}">{{$value['full_th_name']}}</option>
      <?
        }
      ?>
        
      </select>
      </div>
  </div>

  <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">สังกัด*</label>
      <div class="col-lg-10">
      <div id="department_byministry_id"></div>
      </div>
  </div>

  
<div class="modal-footer col-lg-12">
      <button type="submit" class="btn btn-primary" >บันทึกหน่วยงาน</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop