@extends('layouts.admin')
@section ('admincontent')
 
<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">การตั้งค่า</li>
  <li><a href="{{ URL::to('privacy') }}/{{ Auth::getUser()->id }}">ตั้งค่าไพรเวซี</a></li>
</ol>
 <div class="col-lg-12">
  <div class="bs-example bs-example-tabs">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-toggle="tab" href="#userpri">ไพรเวซีผู้ใช้งาน</a></li>
        @if($user_info->grp_id == 1)
          <li><a data-toggle="tab" href="#privacyinit">ไพรเวซีเริ่มต้น</a></li>
        @endif
        @if($user_info->grp_id == 2)
        <!-- Allow only admin and superadmin-->

        <li><a data-toggle="tab" href="#datapri">ไพรเวซีข้อมูล</a></li>

        @endif
        <li><a data-toggle="tab" href="#dataretain">การเก็บรักษาข้อมูล</a></li>
      </ul>

      <div class="tab-content" id="myTabContent">
        <div id="userpri" class="tab-pane fade in active">
          <div class="panel panel-default ">
              <!-- Change Password panel contents -->
              <div class="panel-heading">แผงไพรเวซีผู้ใช้</div>
              <div class="panel-body">
                <p>กำหนดค่าให้ผู้งานท่านอื่นมองเห็น</p>
              </div>
              {{ Form::open([
                "route" => array("privacyuser", Auth::getUser()->id),
                "id"=>"form-accountsave",
                "autocomplete" => "off",
                "class"=>"form-horizontal"
              ])}}
              
              <ul class="errors">
                @foreach($errors->all('<li>:message</li>') as $message)
                  {{ $message }}
                @endforeach
                </ul>
              
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">ชื่อผู้ช้งาน</label>
                    <div class="col-lg-4">
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="fname" 
                          @if(count($priv_user) > 0)
                            @if($priv_user->fname) checked @endif
                          @endif
                          >
                      </div>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">นามสกุล</label>
                    <div class="col-lg-4">
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="lname" 
                          @if(count($priv_user) > 0)
                            @if($priv_user->lname) checked @endif
                          @endif
                          >
                      </div>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">อีเมล์</label>
                    <div class="col-lg-4">
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="email" 
                          @if(count($priv_user) > 0)
                            @if($priv_user->email) checked @endif
                          @endif
                          >
                      </div>

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">เบอร์ติดต่อ</label>
                    <div class="col-lg-4">
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="telno" 
                          @if(count($priv_user) > 0)
                            @if($priv_user->telno) checked @endif
                          @endif
                          >
                      </div>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">หน่วยงานสังกัด</label>
                    <div class="col-lg-4">
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="agency" 
                          @if(count($priv_user) > 0)
                            @if($priv_user->agency) checked @endif
                          @endif
                          >
                      </div>

                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">กระทรวง</label>
                    <div class="col-lg-4">
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="ministry"
                          @if(count($priv_user) > 0) 
                            @if($priv_user->ministry) checked @endif
                          @endif
                          >
                      </div>

                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">บาทบาท</label>
                    <div class="col-lg-4">
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="role" 
                          @if(count($priv_user) > 0)
                            @if($priv_user->role) checked @endif
                          @endif
                          >
                      </div>

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                  </div>
                {{ Form::close() }}

            </div>
        </div> <!-- End Home Tap -->


        <div id="privacyinit" class="tab-pane fade">
            <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">แผงไพรเวซีเริ่มต้น</div>
            <div class="panel-body">
              <p></p>
            </div>


            <div class="col-md-12 padding-top text-right">
                <!--<a id="delete-item" class="btn btn-danger no-display">Delete</a>-->
                <!-- Button trigger modal -->
                <a href="{{ URL::to('/privacy-add' ) }}" class="btn btn-success btn">เพิ่มไพรเวซีเริ่มต้น</a>
            </div>
            <br />
            
            <!-- Table -->
            <table id="result_search_initprivacy" class="table table-hover table-bordered">
              <thead>
                <tr class="active">
                  <th class="text-center">ลำดับที่</th>
                  <th class="text-center">ชื่อ</th>
                  <th class="text-center">สถานะ</th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;?>
              @foreach ($privacy_init as $key => $value) 
                    <tr>
                      <td class="col-md-2 text-center">
                        {{$i++}}
                      </td>
                      <td class="col-md-2 text-left">
                      {{$value['name_th']}}
                      </td>
                      <td class="col-md-6 text-center">
                      @if($value['init_value'] === true)
                          <font color="green">เปิด</font>
                      @else
                          <font color="red">ปิด</font>  
                      @endif
                      </td>
                      <td class="col-md-2 text-center">
                        <a href="{{ URL::to('privacy-edit' ) }}/{{$value['id']}}" class="btn btn-info btn">แก้ไข</a>
                        @if(!$value['removeable']===false)
                        <a href="{{ URL::to('privacy-del' ) }}/{{$value['id']}}" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการลบทิ้งใช่หรือไม่ ?')">ลบทิ้ง</a>
                        @endif
                      </td>
                    </tr>
              @endforeach

              </tbody>
            </table>
          </div>

        </div> <!-- End privacyinit-->


        @if($user_info->grp_id == 2) <!-- Allow only admin and superadmin-->
        <div id="datapri" class="tab-pane fade">
            <div class="panel panel-default ">
              <!-- Change Password panel contents -->
              <div class="panel-heading">แผงไพรเวซีข้อมูล</div>
              <div class="panel-body">
               <p>ตั้งค่าข้อมูลไหนที่ผู้อื่นสามารถมองเห็น</p>
              </div>
              
              {{ Form::open([
                "route" => array("privacydata", Auth::getUser()->agency_id,Auth::getUser()->id),
                "id"=>"form-accountsave",
                "autocomplete" => "off",
                "class"=>"form-horizontal"
              ])}}
              <ul class="errors">
                @foreach($errors->all('<li>:message</li>') as $message)
                  {{ $message }}
                @endforeach
                </ul>
                @foreach($agency_data as $key=>$data)
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-4 control-label">{{ $data->data_name }}</label>

                    <div class="col-lg-4">
                    <input type="hidden" name="{{ $data->data_id}}:{{ $data->data_id }}" >
                      <div class="make-switch" data-on="success" data-off="warning" data-on-label="เปิด" data-off-label="ปิด">
                          <input type="checkbox" name="{{ $data->data_id }}:{{ $data->data_id }}" 
                          @if(isset($priv_data[$data->data_id]) )
                            @if($priv_data[$data->data_id]->status)
                              checked 
                            @endif
                          @endif
                          >
                      </div>
                    </div>
                  </div>
                @endforeach

                  <div class="form-group">
                    <div class="col-lg-offset-4 col-lg-12">
                      <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                  </div>
                {{ Form::close() }}

            </div>
        </div><!-- End Data Privacy -->
        @endif
        
        @if($user_info->grp_id == 1) <!-- Allow only superadmin-->
        <div id="dataretain" class="tab-pane fade">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">แผงการเก็บรักษาข้อมูล</div>
              <div class="panel-body">
                <p>กำหนดอายุการเก็บรักษาข้อมูล โดยระบุวันเริ่มต้นและระยะเวลาเก็บรักษา</p>
              </div>
              
              <div class="col-md-12 input-group">
                
                <form class="form-inline" role="form" method="post" action="{{URL::route('save_retain')}}">
                  <div class="form-group">
                      
                      <select id="report_data_type" name="report_data_type">
                        @for($i=1;$i <= count($src_table);$i++)
                          <option value="{{ $src_table[$i][0]['id'] }}">{{ $src_table[$i][0]['data_name'] }}</option>
                        @endfor
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control text-center retainDate" name="retainDate" id="retainDate" value="{{ Carbon::now()->format('Y-m-d'); }}" placeholder="Start Datetime">
                    </div>
                     <div class="form-group">
                      <select class="form-control" name="retain_period">
                            @foreach ($period as $key => $val)
                                  <option value="{{ $val['value'] }}">
                                    {{$val['name']}}
                                  </option>
                            @endforeach
                          </select>
                    </div>

                  <button type="submit" class="btn btn-primary">บันทึก</button>  
                  <a  href="{{ URL::to('/retain/search/' ) }}" class="btn btn-success btn retain-gosearch">เรียกดู</a>
                </form>   

              </div>
              </br>
              <!-- Table -->
              <table id="result_search_retain" class="table table-hover table-bordered">
                <thead>
                  <tr class="active">
                    <th class="text-center col-md-2">วันเริ่มต้น</th>
                    <th class="text-center col-md-2">วันสุดท้าย</th>
                    <th class="text-center col-md-2">ระยะเวลาเก็บ</th>
                    <th class="text-center col-md-2">วันสุดท้าย</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                      <tr>
                        <td class="col-md-2">
                           
                        </td>
                        <td class="col-md-2">
                          
                        </td>
                        <td class="col-md-2">
                          
                        </td>
                        <td class="col-md-2">
                          
                        </td>
                        <td class="col-md-2">
                          
                        </td>
                      </tr>

                </tbody>
              </table>
            </div>

            
        </div>
      </div>
      @endif
      

      @if($user_info->grp_id !=1) <!-- Allow only admin and user-->
        <div id="dataretain" class="tab-pane fade">
            <div class="panel panel-default ">
                <!-- Change Password panel contents -->
                <div class="panel-heading">แผงการเก็บรักษาข้อมูล</div>
                <div class="panel-body">
                    <table id="result_search_report" class="table table-hover table-bordered">
                    <thead>
                      <tr class="active">
                        <th class="text-center col-md-2">ชื่อข้อมูล</th>
                        <th class="text-center col-md-2">วันเริ่มต้น</th>
                        <th class="text-center col-md-2">วันสุดท้าย</th>
                        <th class="text-center col-md-2">ระยะเวลาเก็บ</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($retain_data as $key => $val)
                          <tr>
                            <td class="col-md-3 text-left">
                               {{$val->data_name   }}
                            </td>
                            <td class="col-md-3 text-center">
                              {{$val->start_retain_date   }}
                            </td>
                            <td class="col-md-3 text-center">
                              {{$val->period  }}
                            </td>
                            <td class="col-md-3 text-center">
                              {{$period_text[$val->retain_text]}}
                            </td>
                          </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
      </div>
      @endif


      <!--End tap-->
      </div>
    </div>

   
 </div><!--/col-lg-12-->

@stop
