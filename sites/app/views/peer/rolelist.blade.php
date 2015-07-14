@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li><a href=" {{ URL::to('admin')}}">หน้าหลัก</a></li>
  <li class="active">ค้นหา</li>
  <li class="active">ค้นหาตามบทบาท</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายการบทบาท</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-4 input-group">
    <form class="form-inline" role="form">
      <div class="form-group">
        <select class="form-control" name="peerrole-list" id="peerrole-list">
          @foreach ($all_role as $key => $val)
            <option value="{{$val->id}}">{{$val->role_name}}</option>
          @endforeach
        </select>
      </div>
        <a  href="{{ URL::to('/peer/rolelist' ) }}" class="btn btn-default btn-sm peerrole">ค้นหา</a>
    </form>

  </div>
  <br />
  <br />
  <br />
  <br />
  <!-- Table -->
  <table id="result_peerrole" class="table table-hover">

    
  </table>
</div>
@stop