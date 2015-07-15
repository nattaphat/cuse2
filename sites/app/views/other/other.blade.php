@extends('layouts.admin')
@section ('admincontent')
 
 <!-- http://www.webtipblog.com/adding-scroll-top-button-website/ -->
 <div class="scroll-top-wrapper ">
    <span class="scroll-top-inner">
        <i class="icon-circle-arrow-up icon-5"></i>
    </span>
</div>

<ol class="breadcrumb">
  <li><a href="{{ URL::to('admin') }}">หน้าหลัก</a></li>
  <li class="active">เอกสารเผยแพร่คลังสารสนเทศกลาง</li>
</ol>
<div class="col-lg-12">

                <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">เอกสารเผยแพร่คลังสารสนเทศกลาง</div>
                      <div class="panel-body">
                        <p>
                          {{--อธิบายคำศัพท์ นิยามคำ ที่ใช้งานในคลังสารสนเทศกลาง--}}
                        </p>
                      </div>
                      <!-- Table -->
                      <table id="result_search_policy"  class="table table-hover table-bordered">
                        <thead>
                          <tr class="active">
                            <th class="text-center">#</th>
                            <th class="text-center">รายการ</th>
                            <th class="text-center">อัพโหลดไฟล์เอกสาร</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach( $rs as $key => $val)
                              <tr >
                                <td class="col-md-1 text-center">
                                    <input type="checkbox" class="" id="chkbx_{{$val->eng_name}}" name="chkbx_{{$val->eng_name}}">
                                </td>
                                <td class="col-md-5 text-left">
                                    ความมุ่งมั่นที่แสดงให้เห็นว่าได้รับความร่วมมือจากกลุ่มผู้ใช้งานและมีส่วนได้เสีย
                                </td>
                                <td class="col-md-6 text-center">
                                    <a href="{{ URL::route('proac_commmitupload') }}/{{$val->id}}" class="btn btn-info cls_{{$val->eng_name}}">
                                        อัพโหลดเอกสาร
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                      
            </div><!-- End All Privacy -->
    </div>

   
</div><!--/col-lg-12-->
@stop
