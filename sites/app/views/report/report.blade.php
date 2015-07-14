@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">สถิติและรายงาน</li>
  <li class="active">รายงาน</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายงาน</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-12 input-group">
    
    <form class="form-inline" role="form">
      <div class="form-group">
          
          <select id="report_data_type" name="report_data_type">
            @foreach ($listbox as $key=>$value)
              <option value="{{$value['id']}}">{{$value['name']}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control sdt" id="sdt" value="{{ Carbon::now()->subDays(3)->format('Y-m-d H:i'); }}" placeholder="Start Datetime">
        </div>
         <div class="form-group">
          <input type="text" class="form-control edt" id="edt" value="{{ Carbon::now()->format('Y-m-d H:i'); }}" placeholder="End Datetime">
        </div>
        
      <a  href="{{ URL::to('report-search' ) }}" class="btn btn-default btn report-gosearch">ค้นหา</a>
      <div class="col-md-12 padding-top text-right">
            <a href="{{ URL::to('/report/log/export' ) }}" class="btn btn-success log_export">csv
              </a>
        </div>
    </form>   

  </div>
  </br>
  <!-- Table -->
  <table id="result_search_report" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center col-md-2">ไอพี</th>
        <th class="text-center col-md-2">โฮส</th>
        <th class="text-center col-md-2">โฮส</th>
        <th class="text-center col-md-2">ล่าสุด</th>
        <th class="text-center col-md-2">บทบาท</th>
        <th class="text-center col-md-2">ข้อมูล</th>
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
</div>

@stop
