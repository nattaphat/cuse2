@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">หลักสูตรอบรม</li>
  <li class="active">ออกรายงาน-รายคน</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงออกรายงาน-รายคน</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-12 input-group">
    
    <form class="form-inline" role="form">
      <div class="form-group">
          
          <select id="report_man" name="report_man">
            @foreach ($rs as $key=>$value)
              @if($value->grp_id != 1)
                <option value="{{$value->user_id}}">{{$value->fname}} {{$value->lname}}</option>
              @endif
            @endforeach
          </select>
        </div>

      <a  href="{{ URL::route('trining_manreport' ) }}" class="btn btn-default btn reportman-gosearch">ค้นหา</a>
    </form>   
  </div>


  </br>
  <div id="result_reportman_report">
  <!-- Table -->
  <table class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center col-md-2">ชื่อหลักสูตร</th>
        <th class="text-center col-md-4">รายละเอียด</th>
        <th class="text-center col-md-2">การเข้าร่วม</th>
        <th class="text-center col-md-2">วันที่สร้าง</th>
        <th class="text-center col-md-2">วันที่สิ้นสุด</th>
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
  </div><!-- Ajax -->
</div>

@stop
