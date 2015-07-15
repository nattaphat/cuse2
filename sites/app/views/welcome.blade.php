@extends('layouts.admin')
@section ('admincontent')
 
<ol class="breadcrumb">
  <li><a href="{{ URL::to('admin') }}">หน้าหลัก</a></li>
  <li class="active">นโยบายคลังฯ</li>
</ol>
<div class="col-lg-12">
    <div class="bs-example bs-example-tabs">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active relate_policy"><a data-toggle="tab" href="#relate_policy">นโยบายที่เกี่ยวข้อง</a></li>
            <li><a data-toggle="tab" href="#all_policy">นโยบายทั้งหมด</a></li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div id="relate_policy" class="tab-pane fade in active">
                    <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">แผงนโยบาย</div>
                      
                      <p></p>
                      <!-- Table -->
                      <table id="result_search_policy2" class="table table-hover table-bordered">
                        <thead>
                          <tr class="active">
                            <th class="text-center">รหัส</th>
                            <th class="text-center">เนื้อหา</th>
                            <th class="text-center">ผู้สร้าง</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">ผู้รับผิดชอบ</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody><?php $item = 1 ?>
                          @foreach ($relate_policy as $policy)
                              <tr>
                                <td>
                                   {{ $policy->id }}
                                </td>
                                <td class="col-md-6">
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
                                    <font color="green">เปิดใช้งาน</font>
                                  @else
                                    อยู่ระหว่างพิจารณา
                                  @endif
                                </td>
                                <td class="text-center col-md-1">
                                 <input type="hidden" id="policyduty_userinfo" value="{{URL::to('/policyduty/userinfo/')}}/{{$policy->policy_duty}}">
                                  <a data-toggle="modal" href="#myModal" id="{{$policy->policy_duty}}" class="dutylist">
                                  <?php
                                    $rs = PolicyDuty::find($policy->policy_duty);
                                    echo $rs['fname'];
                                  ?>
                                  </a>

                                  </td>
                                <td class="col-md-2 text-center">
                                  <a  
                                    href="{{ URL::to('policy-rbac/user' ) }}/{{ $policy->id }}" 
                                    class="btn btn-primary btn"
                                    @if(!$policy->status)
                                      disabled="disabled"
                                    @endif
                                    >พีอาร์บีเอซี
                                  </a>
                                  <a href="{{ URL::to('pbdiapolicy' ) }}/{{ $policy->id }}" class="btn btn-success btn">พีบีดีพีไอเอ</a>
                                </td>
                              </tr>

                          @endforeach
                        </tbody>
                      </table>
                    </div>

            </div> <!-- End Relate Policy Tap -->
            <div id="all_policy" class="tab-pane fade">
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
                            <input type="text" class="form-control" id="policy-keyword" placeholder="คำค้น">
                          </div>
                            <a  href="{{ URL::to('policy-search' ) }}" class="btn btn-default btn-sm policy-gosearch">ค้นหา</a>
                        </form>

                      </div>
                      <br />
                      <br />
                      <!-- Table -->
                      <table id="result_search_policy" class="table table-hover table-bordered">
                        <thead>
                          <tr class="active">
                            <th class="text-center">รหัส</th>
                            <th class="text-center">เนื้อหา</th>
                            <th class="text-center">ผู้สร้าง</th>
                            <th class="text-center">ผู้รับผิดชอบนโยบาย</th>
                            <th class="text-center">สถานะ</th>

                            <th></th>
                          </tr>
                        </thead>
                        <tbody><?php $item = $paginator->getFrom() ?>
                          @foreach ($paginator as $policy)
                              <tr>
                                <td>
                                   {{ $item++ }}
                                </td>
                                <td class="col-md-7 ">
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
                                 <input type="hidden" id="policyduty_userinfo_{{$policy->policy_duty}}" value="{{URL::to('/policyduty/userinfo/')}}/{{$policy->policy_duty}}">
                                <td class="text-center col-md-1">
                                  <a data-toggle="modal" data-id="{{$policy->policy_duty}}" href="#myModal" id="{{$policy->policy_duty}}" class="dutylist">
                                  {{ $policy->fname }}
                                  </a>

                                  </td>
                                <td class="text-center">
                                  @if($policy->status == 1)
                                    <font color="green">เปิดใช้งาน</font>
                                  @else
                                    อยู่ระหว่างพิจารณา
                                  @endif
                                </td>
                                <td class="text-center">
                                  <a href="{{ URL::to('pbdiapolicy' ) }}/{{ $policy->id }}" class="btn btn-success btn">พีบีดีพีไอเอ</a>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div id="pager">
                      @include('slider')
                    </dir>
                      
            </div><!-- End All Privacy -->
        </div>
    </div>

   
</div><!--/col-lg-12-->

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
@stop
