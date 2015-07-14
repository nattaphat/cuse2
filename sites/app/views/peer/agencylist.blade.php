@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li><a href="{{ URL::to('admin')}}">หน้าหลัก</a></li>
  <li class="active">ค้นหา</li>
  <li a class="active">ค้นหาตามหน่วยงาน</li>

</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายการหน่วยงาน</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-6 input-group">
    <form class="form-inline" role="form">
      <div class="form-group">
        <select class="form-control" name="rbacagency-list" id="rbacagency-list">
          @foreach ($all_agency as $key => $val)
            <option value="{{$val->id}}">{{$val->tname}}</option>
          @endforeach
        </select>
      </div>
        <a  href="{{ URL::to('/peer/agencylist' ) }}" class="btn btn-default btn agencylist">ค้นหา</a>
    </form>

  </div>
<br />
  <br />
  <br />
  <br />
  <!-- Table -->
  <table id="result_agencylist" class="table table-hover table-bordered">

    
  </table>
</div>
@stop