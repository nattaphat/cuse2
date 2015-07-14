@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{ URL::to('/reqdata/reqlist') }}">รายการคำร้องขอ</a></li>
  <li class="active">แก้ไขรายการคำร้องขอ</li>
</ol>

<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายการคำร้องรอ</div>
  <div class="panel-body">
    <p></p>
  <br />
  <div class="col-lg-8">
  {{ Form::open([
  "route" => array("reqdata_reqlistsave", $req_data[0]->id),
  "id"=>"form-policy-adding",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ข้อมูลที่ร้องขอ</label>
      <div class="col-lg-5">
        {{ Form::text("agency_name", $req_data[0]->data_name ,[
        "id"=>"agency_name",
        "disabled"=>true,
        "placeholder" => "",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ความถี่ข้อมูล</label>
      <div class="col-lg-5">
        {{ Form::text("agency_name", $req_data[0]->cond_name ,[
        "id"=>"agency_name",
        "disabled"=>true,
        "placeholder" => "",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

 <div class="form-group">
      <label for="inputPassword1" class="col-lg-3 control-label">สถานะการร้องขอ*</label>
      <div class="col-lg-5">
        <select class="form-control" name="req_status">
          <option value="">-- เลือก --</option>
          @foreach ($req_status as $key => $val)
            <option value="{{ $val['status'] }}">
            {{ $val['text'] }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-3 control-label">ผู้ร้องขอ</label>
      <div class="col-lg-5">
        {{ Form::text("policy-author",$req_data[0]->fname.' '.$req_data[0]->lname , [
          "id"=>"policy-author",
          "disabled"=>true,
          "placeholder" => "Author",
          "class"=>"form-control"
      ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-3 control-label">หน่วยงานผู้ร้องขอ</label>
      <div class="col-lg-5">
        {{ Form::text("policy-author",Agency::find($req_data[0]->send_agencyid)->tname , [
          "id"=>"policy-author",
          "disabled"=>true,
          "placeholder" => "Author",
          "class"=>"form-control"
      ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-3 control-label">วันที่ร้องขอ</label>
      <div class="col-lg-5">
        {{ Form::text("policy-author",Carbon::createFromTimeStamp(strtotime($req_data[0]->created_at))->format('Y-m-d h:m') .' น.' , [
          "id"=>"policy-author",
          "disabled"=>true,
          "placeholder" => "Author",
          "class"=>"form-control"
      ]) }}
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-3 control-label">หมายเหตุ</label>
      <div class="col-lg-8">
        {{ Form::textarea("req_comment","", [
          "id"=>"req_comment",
          "placeholder" => "หมายเหตุ",
          "class"=>"form-control",
          "rows"=>"11",
          "cols"=>"2"
      ]) }}
      </div>
    </div>

<div class="modal-footer">
      <button type="submit" class="btn btn-primary save-policy" >บันทึก</button>
      <!-- <button type="button" class="btn btn-primary save-policy" >Save Policy</button> -->
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

</div>
@stop

