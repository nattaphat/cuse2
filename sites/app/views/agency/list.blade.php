@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{URL::route('actionshow')}}">หน่วยงาน</a></li>
  <li class="active">รายการหน่วยงาน</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายการหน่วยงาน</div>
  <div class="panel-body">
    <p></p>
  </div>
  
<!--   <div class="col-md-4 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="action-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('action-search' ) }}" class="btn btn-default btn action-gosearch">ค้นหา</a>
    </form>

  </div> -->
  <div class="col-md-12 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
      <a href="{{ URL::to('agency/add' ) }}" class="btn btn-success btn">เพิ่มหน่วยงาน</a>
  </div>
  <br />
  <br />
  <!-- Table -->
  <table id="result_search_agency" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">ลำดับ</th>
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อหน่วยงาน</th>
        <th class="text-center">ชื่อย่อ</th>
        <th class="text-center">กระทรวง</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = 1; ?>
      @foreach ($rs as $agency)
          <tr>
            <td class="col-md-1 text-center">
               {{ $item++ }}
            </td>
            <td class="col-md-1 text-center">
              {{ $agency->code }}
            </td>
            <td class="col-md-4 text-left">
              {{ $agency->tname }}
            </td>
            <td class="col-md-1 text-center">
              {{ $agency->abbr }}
            </td>
            <td class="col-md-2 text-left">
              {{ $agency->full_name }} @if(strlen($agency->short_name) >0) ({{ $agency->short_name }}) @endif
            </td>
            <td class="col-md-2 text-center">
              <!-- <a href="{{ URL::to('action-edit' ) }}/{{ $agency->agency_id }}" class="btn btn-info btn">แก้ไข</a> -->
              <a href="{{ URL::to('/agency/del' ) }}/{{ $agency->agency_id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบทิ้งข้อมูลนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
