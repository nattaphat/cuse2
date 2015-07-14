@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li><a href="{{ URL::route( 'policy' )}}">หน้าหลัก</a></li>
  <li class="active">รายการผู้ใช้งาน</li>
  <li class="active">ผู้ใช้งานในระบบ</li>
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
        <input type="text" class="form-control" id="userlist-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('userlist-search' ) }}" class="btn btn-default btn userlist-gosearch">ค้นหา</a>
    </form>

  </div> -->
  
  <br />
  <!-- Table -->
  <table id="result_search_userlist" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อผู้ใช้</th>
        <th class="text-center">นามสกุล</th>
        <th class="text-center">บทบาท</th>
        <th class="text-center">วันที่ลงทะเบียน</th>
        <th class="text-center">ประเภทผู้ใช้</th>
        <th class="text-center">สถานะ</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom() ?>
    @if(count($paginator) >= 1)
      @foreach ($paginator as $user)
        @if($user->user_id !=1)
          <tr>
            <td class="col-md-1 text-center">
               {{ $item++ }}
            </td>
            <td class="col-md-2 text-left">{{ $user->fname }}</td>
            <td class="col-md-2 text-left">{{ $user->lname }}</td>
            <td class="col-md-3 text-left">{{ $user->role_name }}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($user->created_at))->format('Y-m-d'); }}</td>
            <td class="col-md-1 text-left">
                @if($user->grp_id == 2)
                  ผู้ดูแลระบบ
                @else
                  ทั่วไป
                @endif
            </td>
            <td class="col-md-1 text-left">
              @if($user->user_status == 'yes')
                <font color="green">เปิดใช้งาน</font>
              @else
                ปิดการใช้งาน
              @endif
            </td>
            <td class="col-md-1 text-center">
              <a  href="{{ URL::to('/userlist/approval' ) }}/{{ $user->user_id }}" class="btn btn-info btn">แก้ไข</a>
            </td>
          </tr>
        @endif
      @endforeach
    @else
      ไม่พบข้อมูล
    @endif
    </tbody>
  </table>
</div>
<div id="pager">
  @include('slider')
</dir>
@stop

