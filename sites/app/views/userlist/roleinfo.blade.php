@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active"><a href="{{ URL::route('user_getrole') }}/{{Usernhc::getRoleName()->role_id}}">รายการสิทธิตามบทบาท</a></li>
</ol>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายละเอียดสิทธิตามบทบาทที่ได้รับ</div>
  <div class="panel-body">
    <p></p>
  </div>
@if(count($rs) > 0)
  <!-- Table -->
  <table id="result_search_requestlist" class="table table-hover table-bordered">
    <thead>
      <tr >
        <th class="text-center">บทบาท</th>
        <th class="text-center">ข้อมูล</th>
        <th class="text-center">การกระทำ</th>
        <th class="text-center">วัตถุประสงค์</th>
        <th class="text-center">เงื่อนไขการใช้งาน</th>
        <th class="text-center">ส่ิงที่จะต้องทำก่อน</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($rs as $key => $result)
          <tr>
            <td class="col-md-2">{{ $result->role_name }}</td>
            <td class="col-md-2">{{ $result->data_name }}</td>
            <td class="col-md-2">{{ $result->action_name }}</td>
            <td class="col-md-2">{{ $result->purp_name }}</td>
            <td class="col-md-2">{{ $result->cond_name }}</td>
            <td class="col-md-2">{{ $result->obl_name }}</td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
@else
      N/A
@endif   
