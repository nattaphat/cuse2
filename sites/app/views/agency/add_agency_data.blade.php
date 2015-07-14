@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">ผู้ใช้และหน่วยงาน</li>
  <li><a href="{{URL::route('agencydata')}}">หน่วยงานและข้อมูล</a></li>
  <li class="active">จัดการหน่วยงานและข้อมูล</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  //"route" => array("agencydata_save","save"),
  "route" => "agencydata_save",
  "id"=>"form-agency_data-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">หน่วยงาน*</label>
      <div class="col-lg-9">
      
      <select id="agency_id" name="agency_id" class="form-control">
        <option value="">- เลือก -</option>
      <? foreach ($agency as $value) {?>
        <option value="{{$value->agency_id}}">{{$value->tname}}</option>
      <?
        }
      ?>
        
      </select>
      </div>
  </div>

  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ข้อมูลของหน่วยงาน*</label>
      <div class="col-lg-9">
        <select id="data_id[]" name="data_id[]" multiple="" class="form-control" size="11">
        @foreach ($data as $value)
          <option value="{{$value->id}}">{{$value->data_name}}</option>
        @endforeach
        </select>
      </div>
  </div>

  
<div class="modal-footer col-lg-12">
      <button type="submit" class="btn btn-primary" >บันทึก</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop