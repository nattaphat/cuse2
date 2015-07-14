@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active"><a href="{{ URL::route('trining_userlist') }}">รายการหลักสูตรอบรม</a></li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายการหลักสูตรอบรม</div>
  <div class="panel-body">
    <p></p>
  </div>
@if(count($results) > 0)
<div class="col-md-4 input-group">
    <span class="input-group-addon">
      <span class="add-on"><i class="icon-search"></i></span>
    </span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="policy-keyword" placeholder="คำค้นหา">
      </div>
        <a  href="{{ URL::to('policy-search' ) }}" class="btn btn-default btn-sm policy-gosearch">ค้นหา</a>
    </form>
  </div>

  <br />
  <br />
  <br />
  <br />

  {{ Form::open([
        "route" => "trining_usersave",
        "id"=>"form-training-adding",
        "autocomplete" => "off",
        "class"=>"form-horizontal"
    ])}}
  <!-- Table -->
  <table id="result_search_requestlist" class="table table-hover table-bordered">
    <thead>
      <tr >
        <th class="text-center">ชื่อหลักสูตร</th>
        <th class="text-center">รายละเอียด</th>
        <th class="text-center">ประวัติการเข้าร่วม</th>
        <th class="text-center">สถานะหลักสูตร</th>
        <th class="text-center">วันที่สร้าง</th>
        <th class="text-center">วันสิ้นสุด</th>
        <th class="text-center">เข้าร่วม</th>
      </tr>
    </thead>
    <tbody>
     
      @foreach ($results as $key => $result)
      
      
      <input type="hidden" name="userid" value="{{ Auth::getuser()->id }}">
          <tr>
            <td class="col-md-2">{{ $result->title }}</td>
            <td class="col-md-2">{{ $result->description }}</td>
            <td class="col-md-2 text-center">
              @if(UserTraining::checkEditAttend(Auth::getuser()->id,$result->id) > 0)
              เข้าร่วม
              @else
               N/A
              @endif
            </td>
            <td class="col-md-2 text-center">
               @if($result->status)
                  <font color='green'>เปิด</font>
                @else
                  <font color='red'>ปิด</font>
                @endif
            </td>
            <td class="col-md-2 text-center">
              {{ Carbon::createFromTimeStamp(strtotime($result->created_at))->format('Y-m-d') }}
            </td>
           
            <td class="col-md-1 text-center">
              {{ Carbon::createFromTimeStamp(strtotime($result->closed_date))->format('Y-m-d') }}
            </td>
            <td class="col-md-1 text-center">
            @if($result->status)
              @if(!UserTraining::checkEditAttend(Auth::getuser()->id,$result->id) > 0)
                {{ Form::checkbox('attend[]', $result->id, $result->attend) }} 
              @endif
            @endif
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
  <div class="col-md-12 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
       <button type="submit" class="btn btn-primary save-policy" >เข้าร่วม</button>
  </div>
  {{ Form::close() }}
@stop
@else
      ไม่มีหลักสูตรอบรม
@endif   
