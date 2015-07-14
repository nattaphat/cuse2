@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">ผู้ใช้และหน่วยงาน</li>
  <li class="active">หน่วยงานและข้อมูล</li>
</ol>


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงหน่วยงานและข้อมูล</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <dir class="row">
      <div class="col-md-6 input-group">
            <select id="agency_id" name="agency_id">
            @foreach ($agency as $agency_)
                <option value="{{$agency_->agency_id}}">{{$agency_->tname}}</option>
            @endforeach
            </select>
            <a  href="{{ URL::to('agencydata' ) }}" class="btn btn-default btn agencydata-gosearch">ค้นหา</a>

      </div>
      <div class="col-md-6">
          <div class="col-md-12 padding-top text-right">
          <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
          <!-- Button trigger modal -->
          <a href="{{ URL::to('/agencydata/form/add' ) }}" class="btn btn-success btn">จัดการหน่วยงานและข้อมูล</a>
      </div>
  </dir>
  <br />
  <div id="result_agency_data"></div>
  
  
</div>
@stop
