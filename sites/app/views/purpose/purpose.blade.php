@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{URL::route('purposeshow')}}">วัตถุประสงค์</a></li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงวัตถุประสงค์</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-4 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="purpose-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('purpose-search' ) }}" class="btn btn-default btn purpose-gosearch">ค้นหา</a>
    </form>

  </div>
  <div class="col-md-8 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
      <a href="{{ URL::to('purpose-add' ) }}" class="btn btn-success btn">เพิ่มชื่อวัตถุประสงค์</a>
  </div>
  <br />
  <br />
  <!-- Table -->
  <table id="result_search_purpose" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อวัตถุประสงค์</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom() ?>
      @foreach ($paginator as $purpose)
          <tr>
            <td class="col-md-1">
               {{ $purpose->id }}
            </td>
            <td class="col-md-8 text-left">
              {{ $purpose->purp_name }}
            </td>
            <td class="col-md-2 text-center">
              <a href="{{ URL::to('purpose-edit' ) }}/{{ $purpose->id }}" class="btn btn-info btn">แก้ไข</a>
              <a href="{{ URL::to('purpose-del' ) }}/{{ $purpose->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบทิ้งวัตถุประสงค์ใช่หรือไม่ ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div id="pager">
  @include('slider')
</div>
@stop
