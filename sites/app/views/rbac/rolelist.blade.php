@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a class="active">RBAC</a></li>
  <li class="active">User List</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Role List</div>
  <div class="panel-body">
    <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
  </div>
  
  <div class="col-md-4 input-group">
    <form class="form-inline" role="form">
      <div class="form-group">
        <select class="form-control" name="rbacrole-list" id="rbacrole-list">
          @foreach ($all_role as $key => $val)
            <option value="{{$val->id}}">{{$val->role_name}}</option>
          @endforeach
        </select>
      </div>
        <a  href="{{ URL::to('/policy-rbac/rolelist/search' ) }}" class="btn btn-default btn-sm rolelist">Go</a>
    </form>

  </div>

  <!-- Table -->
  <table id="result_rolelist" class="table table-hover">

    
  </table>
</div>
@stop