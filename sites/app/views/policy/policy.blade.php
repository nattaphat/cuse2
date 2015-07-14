@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active"><a href="{{URL::route('policy')}}">นโยบายคลังฯ</a></li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงนโยบาย</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-4 input-group">
    <span class="input-group-addon"><span class="add-on"><i class="icon-search"></i></span></span>
    <form class="form-inline" role="form">
      <div class="form-group">
        <input type="text" class="form-control" id="policy-keyword" placeholder="ค้นหานโยบาย">
      </div>
        <a  href="{{ URL::to('policy-search' ) }}" class="btn btn-default btn policy-gosearch">ค้นหา</a>
    </form>
  </div>
  <br />
  <div class="col-md-8 padding-top text-right">
      <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
      <!-- Button trigger modal -->
      <a href="{{ URL::to('policy-add' ) }}" class="btn btn-success btn-sm">เพิ่ม</a>
  </div>
  <br />
  <br />
  <!-- Table -->
  <table id="result_search_policy" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">ลำดับ</th>
        <th class="text-center">เนื้อหานโยบาย</th>
        <th class="text-center">ผู้สร้าง</th>
        <th class="text-center">ผู้รับผิดชอบ</th>
        <th class="text-center">สถานะ</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $i = $paginator->getFrom(); ?> 
      @foreach ($paginator as $policy)
          <tr>
            <td class="text-center col-md-1">
               {{ $i++ }}
            </td>
            <td class="col-md-5">
              {{ Form::textarea("policy-text", $policy->policy_content ,[
                  "id"=>"policy-text",
                  "readonly"=>true,
                  "placeholder" => "Poicy Content",
                  "rows"=>"10",
                  "cols"=>"2",
                  "class"=>"form-control"
              ]) }}
            </td>
            <td class="text-center col-md-1">{{ $policy->author }}</td>
            <input type="hidden" id="policyduty_userinfo_{{$policy->policy_duty}}" value="{{URL::to('/policyduty/userinfo/')}}/{{$policy->policy_duty}}">
            <td class="text-center col-md-1">
              <a data-toggle="modal" data-id="{{$policy->policy_duty}}" href="#myModal" id="{{$policy->policy_duty}}" class="dutylist">
              {{ $policy->fname }}
              </a>

              </td>
            <td class="text-center col-md-1">
              @if($policy->status == 1)
                <font color="green">เปิดใช้งาน</front>
              @else
                อยู่ระหว่างพิจารณา
              @endif
            </td>
            <td class="col-md-4 text-center">
              <a  href="{{ URL::to('policy-rbac' ) }}/{{ $policy->id }}" class="btn btn-primary btn-sm">พีอาร์บีเอซี</a>
              <a  href="{{ URL::to('policy-show' ) }}/{{ $policy->id }}" class="btn btn-info btn-sm">แก้ไข</a>
              <a href="{{ URL::to('pbdiapolicy' ) }}/{{ $policy->id }}" class="btn btn-success btn-sm">พีบีดีพีไอเอ</a>
              <a href="{{ URL::to('policy-del' ) }}/{{ $policy->id }}" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการลบทิ้งนโยบายการใช้งานคลังฯ ใช่หรือไม่ ?')">ลบ</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">ข้อมูลผู้รับผิดชอบ</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="pager">
  @include('slider')
</div>
@stop
