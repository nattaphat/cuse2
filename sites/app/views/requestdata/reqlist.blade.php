@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{ URL::to('/reqdata/reqlist') }}" class="active">คำร้องขอข้อมูล</a></li>
  <li class="active">รายการคำร้องขอข้อมูล</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายการคำร้องขอ</div>
  <!-- <div class="panel-body">
    <p>* ค้นหาจากฟิลด์</p>
  </div>
  
  <div class="col-md-6 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="reqdata-keyword" placeholder="คำค้นหา"> -->
        <!--<select class="form-control" name="requestdata_type" id="requestdata_type">
              <option value="">ทั้งหมด</option>
              @foreach ( RequestDataType::all() as $key => $val)
                <option value="{{$val->id}}">{{$val->type_name}}</option>
              @endforeach
            </select> -->
      <!-- </div>
        <a  href="{{ URL::to('req-search' ) }}" class="btn btn-default btn reqdata-gosearch">ค้นหา</a>
    </form>

  </div> -->
  <br />
  <br />
  <br />

  <!-- Table -->
  <table id="result_search_reqdata" class="table table-hover table-bordered ">
    <thead>
      <tr class="active">
        <th class="text-center">*ข้อมูลที่ร้องขอ</th>
        <th class="text-center">ความถี่ข้อมูล</th>
        <th class="text-center">สถานะการร้องขอ</th>
        <th class="text-center">วัตถุประสงการขอ</th>
        <th class="text-center">*ผู้ร้องขอ</th>
        <th class="text-center">*หน่วยงานผู้ร้องขอ</th>
        <th class="text-center">วันที่ร้องขอ</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if(count($req_data) > 0)
      @foreach ($req_data as $req)
          <tr>
            <td class="col-md-2">{{ $req->data_name }}</td>
            <td class="col-md-2 text-left">{{ $req->cond_name }}</td>
            <td class="col-md-2 text-left">
               @if($req->req_status)
                  <font color='green'>ยินยอมการร้องขอ</font>
                @else
                  <font color='red'>อยู่ระหว่างพิจารณา</font>
                @endif
            </td>
            <td class="col-md-2 text-left">{{ RequestDataType::find($req->req_type)->type_name }}</td>
            <td class="col-md-2 text-left">{{ $req->fname }} {{ $req->lname}} ({{$req->role_name}})</td>
            <td class="col-md-2 text-left">{{ Agency::find($req->send_agencyid)->tname }}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($req->created_at))->format('Y-m-d'); }}</td>
            <td class="col-md-1">
              @if(!$req->req_status)
                <a  href="{{ URL::to('/reqdata/reqlist/edit' ) }}/{{ $req->id }}" class="btn btn-info btn-sm">Edit</a>
              @endif
            </td>
          </tr>
      @endforeach
      @else
      <tr class="col-md-12"><td>ไม่พบข้อมูล</td></tr>
      @endif
    </tbody>
  </table>
</div>
@stop

