@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{URL::route('trining_list')}}">หลักสูตรอบรม</a></li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงหลักสูตรอบรม</div>
  <div class="panel-body">

  </div>
  
<!-- <div class="col-md-4 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="training-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('training-search' ) }}" class="btn btn-default btn training-gosearch">ค้นหา</a>
    </form>
  </div> -->

  <div class="col-md-12 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
      <a href="{{ URL::to('/training/add' ) }}" class="btn btn-success btn">เพิ่มหลักสูตรอบรม</a>
  </div>

  <br />
  <!-- Table -->
  @if(count($paginator) >= 1)
  <table id="result_search_training" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">ชื่อหลักสูตร</th>
        <th class="text-center">รายละเอียด</th>
        <th class="text-center">กลุ่มเป้าหมาย</th>
        <th class="text-center">สถานะ</th>
        <th class="text-center">วันที่สร้าง</th>
        <th class="text-center">วันสิ้นสุด</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($paginator as $key => $result)
          <tr>
            <td class="col-md-2">
             
            @if(count(UserTraining::where('training_id','=',$result->id)->where('attend','=',true)->get()->toArray() >=1 ) )
              <a href="{{ URL('/training/report/')}}/{{$result->id}}">{{ $result->title }}</a>
            @else
              {{ $result->title }}
            @endif
            </td>
            <td class="col-md-2">{{ $result->description }}</td>
            <td class="col-md-2 text-left">{{ $relate_role[$key] }}</td>
            <td class="col-md-1 text-center">
               @if($result->status)
                  <font color='green'>เปิด</font>
                @else
                  <font color='red'>ปิด</font>
                @endif
            </td>
            <td class="col-md-2 text-center">{{ Carbon::createFromTimeStamp(strtotime($result->start_training_date  ))->format('Y-m-d H:i:s') }}</td>
           
            <td class="col-md-2 text-center">{{ Carbon::createFromTimeStamp(strtotime($result->closed_date))->format('Y-m-d H:i:s') }}</td>
            <td class="col-md-1 text-center">
              <a  href="{{ URL::to('/training/edit' ) }}/{{ $result->id }}" class="btn btn-info btn">แก้ไข</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div id="pager">
  @include('slider')
</dir>
@else
  <table id="result_search_training" class="table table-hover">
    <thead>
      <tr >
        <th class="text-center">ชื่อหลักสูตร</th>
        <th class="text-center">รายละเอียด</th>
        <th class="text-center">กลุ่มเป้าหมาย</th>
        <th class="text-center">สถานะหลักสูตร</th>
        <th class="text-center">วันที่สร้าง</th>
        <th class="text-center">วันสิ้นสุด</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
          <tr>
            <td class="col-md-2">ไม่พบข้อมูล</td>
            <td class="col-md-2"></td>
            <td class="col-md-2 text-left"></td>
            <td class="col-md-2 text-left"></td>
            <td class="col-md-2 text-left"></td>
            <td class="col-md-1 text-left"></td>
            <td class="col-md-1"></td>
          </tr>
    </tbody>
  </table>
@endif  
@stop

