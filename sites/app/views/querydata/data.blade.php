@extends('layouts.admin')


@section ('admincontent')
<ol class="breadcrumb">
  <li><a href=" {{ URL::to('/')}}">หน้าหลัก</a></li>
  <li class="active">เรียกดูข้อมูล</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงเรียกดูข้อมูล</div>
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
            
            <table id="result_search_policy" class="table table-hover table-bordered">
              <thead>
                <tr class="active">
                  <th class="text-center">รหัส</th>
                  <th class="text-center">นโยบาย</th>
                  <th class="text-center">ผู้สร้าง</th>
                  <th class="text-center">ผู้รับผิดชอบนโยบาย</th>
                  <th class="text-center">สถานะ</th>
                  <th></th>
                </tr>
              </thead>
              <tbody><?php $item = 1 ?>
                @foreach ($relate_policy as $policy)
                  @if($policy->status)
                    <tr>
                      <td class="text-center">
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
                      <td class="text-center col-md-1">
                                 <input type="hidden" id="policyduty_userinfo" value="{{URL::to('/policyduty/userinfo/')}}/{{$policy->policy_duty}}">
                                  <a data-toggle="modal" href="#myModal" id="{{$policy->policy_duty}}" class="dutylist">
                                  <?
                                    $rs = PolicyDuty::find($policy->policy_duty);
                                    echo $rs['fname'];
                                  ?>
                                  </a>

                                  </td>
                      <td class="text-center">
                        @if($policy->status == 1)
                          <font color="green">เปิดใช้งาน</font>
                        @else
                          อยู่ระหว่างพิจารณา
                        @endif
                      </td>
                      <td>
                        <a  
                            href="{{ URL::to('policy-rbac/user' ) }}/{{ $policy->id }}" 
                            class="btn btn-primary btn"
                            @if(!$policy->status)
                              disabled="disabled"
                            @endif
                            >อาร์บีเอซี
                          </a>
                        <a href="{{ URL::to('pbdiapolicy' ) }}/{{ $policy->id }}" class="btn btn-success btn">พีบีดีไอเอ</a>
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

  <!-- Data type relate policy -->
  <div class="form-group col-md-3">
   <select class="form-control querydata-list" name="querydata-list" id="querydata-list">
        <option value="">-- เลือก --</option>
          @foreach ($all_data as $key => $val)
            <option value="{{$val->data_id}}">{{$val->data_name}}</option>
          @endforeach
        </select>
  </div>

  

 <!-- Condition-->
  <div class="form-group col-md-3" id="relate_condition"> 
    <select class="form-control" name="allagency-list" id="condition-list">
          @foreach ($relate_condition as $key => $val)
            <option value="{{$val->cond_id}}">{{$val->cond_name}}</option>
          @endforeach
        </select>
  </div>

    <!-- Selection all Agency or not-->
  <div class="checkbox col-md-2">
    <label>
      <input type="checkbox" id="flag_querydata" checked/> จากหน่วยงานทั้งหมด?
    </label>
  </div>
  
  <!-- Will hide on default -->
  <div class="form-group col-md-3" id="all_agency"> 
    <select class="form-control" name="allagency-list" id="allagency-list">        
          @foreach ($all_agency as $key => $val)
            <option value="{{$val->code}}">{{$val->tname}}</option>
          @endforeach
        </select>
  </div>

  <a  href="{{ URL::to('/querydata/get' ) }}" class="btn btn-success btn-sm querydata">ค้นหา</a>
</form>

  <br />
  <!-- Table -->
  <div id="result_querydata"></div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">ข้อมูลผู้รับผิดชอบนโยบาย</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@stop