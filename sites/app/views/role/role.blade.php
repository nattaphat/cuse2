@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{ URL::route('roleshow') }}">บทบาท</a></li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงบทบาท</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-4 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="role-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('role-search' ) }}" class="btn btn-default btn role-gosearch">ค้นหา</a>
    </form>

  </div>
  <div class="col-md-8 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
      <a href="{{ URL::to('role-add' ) }}" class="btn btn-success btn">เพิ่มชื่อบทบาท</a>
  </div>
  <!-- Table -->
  <br />
  <br />
  <table id="result_search_role" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อบทบาท</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = 1 ?>
      @foreach ($paginator as $role)
          <tr>
            <td class="col-md-1 text-center">
               {{ $role->id }}
            </td>
            <td class="col-md-6 text-left">
              {{ $role->role_name }}
            </td>
            <td class="col-md-2 text-center">
              <a href="{{ URL::to('role-edit' ) }}/{{ $role->id }}" class="btn btn-info btn">แก้ไข</a>
              <a href="{{ URL::to('role-del' ) }}/{{ $role->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบทิ้งชื่อบทบาทนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div id="pager">
  @include('slider')
</dir>
@stop
