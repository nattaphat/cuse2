@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">รายการผู้ใช้งาน</li>
    <li class="active"><a href="{{URL::to('policyduty/list')}}">ผู้รับผิดชอบนโยบาย</a></li>
    <li class="active">รายการผู้รับผิดชอบนโยบาย </li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงผู้ใช้งานในระบบ</div>
  <div class="panel-body">
    <p></p>
  </div>
  
<!--   <div class="col-md-4 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="policyduty-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('policyduty/search/' ) }}" class="btn btn-default btn-sm policyduty-gosearch">ค้นหา</a>
    </form>

  </div> -->

  <div class="col-md-12 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
      <a href="{{ URL::to('policyduty/add' ) }}" class="btn btn-success btn">เพิ่มผู้รับผิดชอบ</a>
  </div>
  
  <br />
  <br />
  <!-- Table -->
  <table id="policyduty_search" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">ลำดับ</th>
        <th class="text-center">ชื่อ</th>
        <th class="text-center">นามสกุล</th>
        <th class="text-center">ตำแหน่ง</th>
        <th class="text-center">เบอร์ติดต่อ</th>
        <th class="text-center">อีเมล</th>
        <th class="text-center">วันที่เพิ่ม</th>
        <th class="text-center">สถานะ</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    @if( count($paginator) > 0 )
    <tbody><?php $i = $paginator->getFrom() ?>
        @foreach ($paginator as $key => $val)
          <tr>
            <td class="col-md-1 text-center">{{ $i++ }}</td>
            <td class="col-md-1 text-center">{{$val->fname}}</td>
            <td class="col-md-2 text-center">{{$val->lastname}}</td>
            <td class="col-md-2 text-center">{{$val->position}}</td>
            <td class="col-md-2 text-center">{{$val->tel}}</td>
            <td class="col-md-1 text-center">{{$val->email}}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($val->created_at))->format('Y-m-d'); }}</td>
            <td class="col-md-1 text-center">
            @if($val->status)
              <font color="green">เปิดใช้งาน</font>
            @else
              <font color="red">ระงับใช้งาน</font>
            @endif
            </td>
            <td class="col-md-1 text-center">
              <a  href="{{ URL::to('/policyduty/edit' ) }}/{{ $val->id }}" class="btn btn-info btn">แก้ไข</a>
            </td>
          </tr>
        @endforeach
    </tbody>
    @else
      <tbody>
          <tr>
            <td class="col-md-1">
               ไม่พบข้อมูล
            </td>
            
          </tr>
      </tbody>
        
    @endif 
  </table>
</div>
  
@if( count($paginator) > 0 )
<div id="pager">
  @include('slider')
</div>
@endif
@stop

