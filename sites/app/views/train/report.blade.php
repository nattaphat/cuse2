@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{URL::route('trining_list')}}">หลักสูตรอบรม</a></li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายงานหลักสูตรอบรม</div>
  <div class="panel-body">
    <p></p>
  </div>
  
<div class="col-md-4 input-group">
    
   
  </div>

  <div class="col-md-8 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->

  </div>
  <br />
  
  <!-- Table -->
  <table id="result_search_training" class="table table-hover">
    <thead>
      <tr >
        <th class="text-center">ชื่อหลักสูตร</th>
        <th class="text-center">ชื่อผู้เข้าร่วม</th>
        <th class="text-center">ตำแหน่ง</th>
        <th class="text-center">หน่วยงาน</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($paginator as $key => $result)
          <tr>
            <td class="col-md-2 text-center">{{ $result->title}}</td>
            <td class="col-md-2 text-center">{{ $result->fname }} {{ $result->lname }}</td>
            <td class="col-md-2 text-center">{{ $result->role_name }}</td>
            <td class="col-md-2 text-center">{{ $result->tname }}</td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div id="pager">
  @include('slider')
</dir>
@stop

