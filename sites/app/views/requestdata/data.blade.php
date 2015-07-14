@extends('layouts.admin')


@section ('admincontent')
<ol class="breadcrumb">
  <li><a href=" {{ URL::to('/')}}">หน้าหลัก</a></li>
  <li class="active">ขอข้อมูล</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงขอข้อมูล</div>
  <div class="panel-body">
    <p></p>
    
    <!-- Start Collapse -->
    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          นโยบายที่เกี่ยวข้อง
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
            
            <table id="result_search_policy" class="table table-hover">
              <thead>
                <tr >
                  <th class="text-center">ลำดับที่</th>
                  <th class="text-center">เนื้อหา</th>
                  <th class="text-center">ผู้สร้าง</th>
                  <th class="text-center">สถานะ</th>
                  <th></th>
                </tr>
              </thead>
              <tbody><?php $item = 1 ?>
                @foreach ($relate_policy as $policy)
                  @if($policy->status)
                    <tr>
                      <td>
                         {{ $item++ }}
                      </td>
                      <td class="col-md-6 ">
                        {{ Form::textarea("policy-text", $policy->policy_content ,[
                            "id"=>"policy-text",
                            "readonly"=>true,
                            "placeholder" => "Poicy Content",
                            "rows"=>"10",
                            "cols"=>"2",
                            "class"=>"form-control"
                        ]) }}
                      </td>
                      <td class="text-center">{{ $policy->author }}</td>
                      <td class="text-center">
                        @if($policy->status == 1)
                          เปิดใช้งาน
                        @else
                          อยู่ระหว่างพิจารณา
                        @endif
                      </td>
                      <td>
                        <a  
                          href="{{ URL::to('policy-rbac/user' ) }}/{{ $policy->id }}" 
                          class="btn btn-primary btn-sm"
                          >อาร์บีเอซี
                        </a>
                        <a href="{{ URL::to('pbdiapolicy' ) }}/{{ $policy->id }}" class="btn btn-success btn-sm">พีบีดีไอเอ</a>
                      </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>

      </div>
    </div>
  </div>
  
    <!-- End Collapse -->
 <br />
  </div> <!-- End panel-body -->

  <form class="form-inline" role="form">
    <input type="hidden" value="{{URL::to('/reqdata/databyagency/')}}" id="req_databyagency_url">
    <!-- Agency-->
    <div class="form-group col-md-3"> 
        <select class="form-control" name="allagency-list" id="allagency-list">
            <option value="">-- เลือก --</option>
          @foreach ($all_agency as $key => $val)
            <option value="{{$val->code}}">{{$val->tname}}</option>
          @endforeach
        </select>
    </div>

  <!-- Data type relate policy -->
  <div class="form-group col-md-3">
        <div id="req_databyagency"></div>
  </div>


 <!-- Condition-->
  <div class="form-group col-md-2" id="relate_condition"> 
        <select class="form-control" name="allagency-list" id="condition-list">
          @foreach ($relate_condition as $key => $val)
            <option value="{{$val->cond_id}}">{{$val->cond_name}}</option>
          @endforeach
        </select>
  </div>
  
  <div class="form-group col-md-3"> 
        <select class="form-control" name="requestdata_type" id="requestdata_type">
          @foreach ( RequestDataType::all() as $key => $val)
            <option value="{{$val->id}}">{{$val->type_name}}</option>
          @endforeach
        </select>
  </div>
    <div class="col-md-1">
        <a  href="{{ URL::to('/reqdata/send' ) }}" class="btn btn-success reqdata">ส่งคำขอ</a>
    </div>
  
</form>

  <br />
  <br />
  <br />
  <!-- Table -->
  <div id="result_reqdata"></div>
 <?php //UsernhcController::getRequestDataInfo(); ?>
</div>

@stop