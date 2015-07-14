@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{ URL::route('obligationshow') }}">ข้อผูกพัน</a></li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงข้อผูกพัน</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-4 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="obligation-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('obligation-search' ) }}" class="btn btn-default btn obligation-gosearch">ค้นหา</a>
    </form>

  </div>
  <div class="col-md-8 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
      <a href="{{ URL::to('obligation-add' ) }}" class="btn btn-success btn">เพิ่มข้อผูกพัน</a>
  </div>
  <br />
  <br />
  <!-- Table -->
  <table id="result_search_obligation" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อข้อผูกพัน</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom() ?>
    @if(count($paginator) >=1)
      @foreach ($paginator as $obligation)
          <tr>
            <td class="col-md-1 text-center">
               {{ $item++ }}
            </td>
            <td class="col-md-8 text-left">
              {{ $obligation->obl_name }}
            </td>
            <td class="col-md-2 text-center">
              <a href="{{ URL::to('obligation-edit' ) }}/{{ $obligation->id }}" class="btn btn-info btn">แก้ไข</a>
              <a href="{{ URL::to('obligation-del' ) }}/{{ $obligation->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบข้อผูกพันนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    @else
      No result.
    @endif
    </tbody>
  </table>
</div>
<div id="pager">
  @include('slider')
</dir>
@stop
