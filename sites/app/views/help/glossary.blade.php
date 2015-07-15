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
  <li class="active">อภิธานศัพท์</li>
</ol>
<div class="col-lg-12">

                <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">แผงอภิธานศัพท์</div>
                      <div class="panel-body">
                        <p>
                          อธิบายคำศัพท์ นิยามคำ ที่ใช้งานในคลังสารสนเทศกลาง
                        </p>
                      </div>
                      <!-- Table -->
                      <table id="result_search_policy"  class="table table-hover table-bordered">
                        <thead>
                          <tr class="active">
                            <th class="text-center">ลำดับ</th>
                            <th class="text-center">คำศัพธ์</th>
                            <th class="text-center">คำอธิบาย</th>
                          </tr>
                        </thead>
                        <tbody>
                              <tr >
                                <td class="col-md-1 text-center">
                                    1.
                                </td>
                                <td class="col-md-4 text-left">
                                    ข้อมูลรายชั่วโมง
                                </td>
                                <td class="col-md-7 text-left">
                                    ผลรวมค่าของข้อมูลที่ในช่วงเวลาหนึ่งชั่วโมง
                                </td>
                              </tr>
                              <tr >
                                <td class="col-md-1 text-center">
                                    2.
                                </td>
                                <td class="col-md-4 text-left">
                                    ข้อมูล 24 ชั่วโมง
                                </td>
                                <td class="col-md-7 text-left">
                                    ผลรวมค่าของข้อมูลนับตั้งแต่ข้อมูลชั่วโมงล่าสุดย้อนหลังไป 24 ชั่วโมง
                                </td>
                              </tr>
                            <tr >
                                <td class="col-md-1 text-center">
                                    3.
                                </td>
                                <td class="col-md-4 text-left">
                                    ข้อมูลวานนี้
                                </td>
                                <td class="col-md-7 text-left">
                                    ผลรวมค่าข้อมูลตั้งแต่เวลา 7.00 น. ของวันก่อนหน้าถึงเวลา 7.00 น. วันปัจจุบัน
                                </td>
                              </tr>
                            <tr >
                                <td class="col-md-1 text-center">
                                    4.
                                </td>
                                <td class="col-md-4 text-left">
                                    ข้อมูลวันนี้
                                </td>
                                <td class="col-md-7 text-left">
                                    ผลรวมค่าข้อมูลตั้งแต่เวลา 7.00 น. วันปัจจุบันจนถึงเวลาปัจจุบัน
                                </td>
                              </tr>
                            <tr >
                                <td class="col-md-1 text-center">
                                    5.
                                </td>
                                <td class="col-md-4 text-left">
                                    ข้อมูล 7 วันย้อนหลัง
                                </td>
                                <td class="col-md-7 text-left">
                                    ผลรวมค่าข้อมูลตั้งแต่เวลาปัจจุบันย้อนหลังไป 168 ชั่วโมง
                                </td>
                              </tr>
                        </tbody>
                      </table>
                    </div>
                      
            </div><!-- End All Privacy -->
    </div>

   
</div><!--/col-lg-12-->
@stop
