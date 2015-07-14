@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">หลักสูตรอบรม</li>
  <li class="active">ออกรายงาน-ชื่อหลักสูตร</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงออกรายงาน-ชื่อหลักสูตร</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-12 input-group">
    
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="course-keyword" placeholder="ชื่อหลักสูตร">
      </div>
        <a  href="{{ URL::route('trining_coursereport' ) }}" class="btn btn-default btn course-gosearch">ค้นหา</a>
    </form> 
  </div>

  <br />
  <div id="result_reportcourse_report">
  
  <!-- Table -->
  <table class="table table-hover table-bordered">
    <thead>
      <tr >
        <th class="text-center col-md-2">ชื่อหลักสูตร</th>
        <th class="text-center col-md-4">รายละเอียด</th>
        <th class="text-center col-md-2">การเข้าร่วม</th>
        <th class="text-center col-md-2">วันที่สร้าง</th>
        <th class="text-center col-md-2">วันที่สิ้นสุด</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

          <tr>
            <td class="col-md-2">
               
            </td>
            <td class="col-md-2">
              
            </td>
            <td class="col-md-2">
              
            </td>
            <td class="col-md-2">
              
            </td>
            <td class="col-md-2">
              
            </td>
            <td class="col-md-2">
            </td>
          </tr>

    </tbody>
  </table>
  </div> <!-- Ajax -->
</div>

@stop
