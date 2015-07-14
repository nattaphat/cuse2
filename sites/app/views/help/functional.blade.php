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
  <li class="active">ช่วยเหลือ</li>
</ol>
<div class="col-lg-12">

                <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">แผงฟังก์ชันงานในระบบ</div>
                      <div class="panel-body">
                        <p>
                          ตำแหน่งหน้าที่ผู้ใช้งานในระบบ
                          <ol>
                            <li>เจ้าหน้าที่คลังสารสนเทศ</li>
                            <li>ผู้ใช้งานประเภทผู้ดูแลระบบ (หนึ่งหน่วยงานมีได้คนเดียว)</li>
                            <li>ผู้ใช้งานประเภททั่วไป</li>
                          </ol>
                        </p>
                      </div>
                      <!-- Table -->
                      <table id="result_search_policy"  class="table table-hover table-bordered">
                        <thead>
                          <tr class="active">
                            <th class="text-center">กรอบปัญหา</th>
                            <th class="text-center">ฟังก์ชันงาน</th>
                            <th class="text-center">ตำแหน่งหน้าที่</th>
                            <th class="text-center">หลักการพีบีดี</th>
                            <th class="text-center">ระบบงานสนับสนุน</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="active">
                            <th class="text-center">กรอบปัญหา</th>
                            <th class="text-center">ฟังก์ชันงาน</th>
                            <th class="text-center">ตำแหน่งหน้าที่</th>
                            <th class="text-center">หลักการพีบีดี</th>
                            <th class="text-center">ระบบงานสนับสนุน</th>
                          </tr>
                        </tfoot>
                        <tbody>
                              <tr >
                                <td class="col-md-4 text-left">
                                  1.การกำหนดนโยบายการใช้งานข้อมูลตามสิทธิและบทบาท
                                </td>
                                <td class="col-md-3 text-left">
                                  <i class="icon-tag icon-1"></i> สนับสนุนการจัดการนโยบาย <br />
                                  <ul>
                                      <li>สามารถค้นหานโยบาย</li>
                                      <li>สามารถบันทึกนโยบายการใช้งาน</li>
                                      <li>สามารถแก้ไขนโยบาย</li>
                                      <li>สามารถเลิกใช้นโยบาย*</li>
                                      <li>สามารถกำหนด/แก้ไข/ลบ <br/>ชื่อผู้รับผิดชอบเพื่อให้ผู้ใช้ติดต่อ</li>
                                  </ul>
                                  <i class="icon-tag icon-1"></i> กำหนดค่าพื้นฐานการใช้ข้อมูล <br />
                                  <ul>
                                      <li>สามารถบันทึกรายการไพรเวซีค่าเริ่มต้นข้อมูลที่อยู่ระบบ</li>
                                      <li>สามารถบันทึกรายการไพรเวซีค่าเริ่มต้นข้อมูลผู้ใช้งาน</li>
                                      <li>สามารถเพิ่มรายการไพรเวซีค่าเริ่มต้นข้อมูลผู้ใช้งาน</li>
                                      <li>สามารถแก้ไขรายการไพรเวซีค่าเริ่มต้นข้อมูลผู้ใช้งาน</li>
                                      <li>สามารถลบรายการไพรเวซีเริ่มต้นข้อมูลผู้ใช้งาน</li>
                                  </ul>
                                  <i class="icon-tag icon-1"></i> ระบุตัวตน มีความสามารถคือ<br/>
                                  <ul>
                                    <li>สามารถเรียกแก้ไขในกรณีลืมรหัสผ่าน</li>
                                    <li>สามารถเข้าสู่ระบบ</li>
                                    <li>สามารถแก้ไขข้อมูลส่วนตัว</li>
                                    <li>สามารถเปลี่ยนรหัสผ่าน</li>
                                  </ul>
                                    <i class="icon-tag icon-1"></i> แนะนำรหัสผ่าน มีความสามารถคือ<br />
                                    <ul>
                                    <li>สามารถสร้างรหัสผ่านให้ผู้ใช้</li>
                                    <li>สามารถให้คำแนะนำในการสร้างรหัสผ่าน</li>
                                  </ul>
                                   <i class="icon-tag icon-1"></i> สนับสนุนการอบรมด้านไพรเวซี <br /> 
                                  <ul>
                                    <li>สามารถบันทึกการเข้ารับการอบรม</li>
                                    <li>สามารถสร้างตารางการอบรม</li>
                                    <li>สามารถแก้ไขตารางการอบรม</li>
                                    <li>สามารถกำหนดกลุ่มเป้าหมาย</li>
                                    <li>สามารถลบตารางการอบรม</li>
                                    <li>สามารถออกรายงานการอบรม</li>
                                    </ul>
                                   <i class="icon-tag icon-1"></i> บริหารการเปิดเผยข้อมูล <br /> 
                                  <ul>
                                    <li>สามารถบันทึกคำร้องการขอใช้ข้อมูล</li>
                                    <li>สามารถค้นหาคำร้องการขอใช้ข้อมูล</li>
                                    <li>สามารถอนุมัติคำร้องการขอใช้ข้อมูลผ่านระบบ</li>
                                    <li>สามารถตรวจสอบสถานะการพิจารณาตามคำร้องขอใช้ข้อมูล</li>
                                    <li>สามารถแสดงรายการคำร้องการข้อใช้ข้อมูล</li>
                                    <li>สามารถแสดงรายงานคำขอใช้ข้อมูลที่ผ่านการพิจารณา</li>
                                    </ul>
                                  <i class="icon-tag icon-1"></i> ควบคุมสิทธิและบทบาท <br />
                                  <ul>
                                    <li>สามารถตรวจสอบสิทธิตามบทบาท</li>
                                    <li>สามารถเพิ่ม/แก้ไข/ลบ บทบาท</li>
                                    <li>สามารถเพิ่ม/แก้ไข/ลบ สิทธิ</li>
                                    <li>สามารถบันทึกมอบหมายสิทธิให้กับบทบาท</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-left">
                                  <br />
                                  <ul>
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                  </ul>
                                  <br /><br />
                                  <ul>
                                      <li>ข้อที่ 1</li><br />
                                      <li>ข้อที่ 1</li><br />
                                      <li>ข้อที่ 1</li><br />
                                      <li>ข้อที่ 1</li><br />
                                      <li>ข้อที่ 1</li>
                                  </ul>
                                  <br /><br />
                                  <ul>
                                      <li>ข้อที่ 1 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                  </ul>

                                  <br />
                                  <ul>
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                  </ul>
                                  <br /><br />
                                  <ul>
                                      <li>ข้อที่ 2 - ข้อที่ 3</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                  </ul>

                                  <br />
                                  <ul>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 2 - ข้อที่ 3</li>
                                      <li>ข้อที่ 2</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li>
                                  </ul>
                                  <br /><br />
                                  <ul>
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                      <li>ข้อที่ 1</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-center">
                                  ข้อที่ 2 และ ข้อที่ 4
                                </td>
                                <td class="col-md-1 text-center">
                                  <i class="icon-ok icon-2"></i>
                                  <br /><br /><br /><br /><br /><br /><br /><br />
                                  <i class="icon-ok icon-2"></i>
                                  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                  <i class="icon-ok icon-2"></i>
                                  <br /><br /><br /><br /><br /><br />
                                  <i class="icon-ok icon-2"></i>
                                  <br /><br /><br /><br /><br />
                                  <i class="icon-ok icon-2"></i>
                                  <br /><br /><br /><br /><br /><br /><br /><br />
                                  <i class="icon-ok icon-2"></i>
                                  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                  <i class="icon-ok icon-2"></i>
                                </td>
                              </tr>

                              <tr >
                                 <td class="col-md-4 text-left">
                                  2.กระบวนการเก็บรักษาข้อมูล
                                </td>
                                <td class="col-md-3 text-left">
                                  <i class="icon-tag icon-1"></i> สร้างตารางรายการสนับสนุนเพื่อการเก็บรักษาและทำลาย<br/>
                                  <ul>
                                  <li>สามารถสร้าง/แก้ไข/ลบ <br/>รายการเก็บรักษาและทำลาย</li>
                                  <li>สามารถบันทึกรายการเก็บรักษาและทำลาย</li>
                                  <li>สามารถแสดงรายงานการเก็บรักษาและทำลาย</li>
                                  </li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-left">
                                  <br /><br />
                                  <ul>
                                      <li>ข้อที่ 1</li><br />
                                      <li>ข้อที่ 1</li><br />
                                      <li>ข้อที่ 1 - ข้อที่ 3</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-center">
                                  ข้อที่ 5
                                </td>
                                <td class="col-md-1 text-center">
                                  <i class="icon-ok icon-2"></i>
                                </td>
                              </tr>

                              <tr >
                                 <td class="col-md-4 text-left">
                                  3.กระบวนการใช้ข้อมูล
                                </td>
                                <td class="col-md-3 text-left">
                                  <i class="icon-tag icon-1"></i> เรียกดูข้อมูลการเข้าใช้งานระบบ <br/>
                                  <ul>
                                  <li>สามารถออกรายงานการเข้าใช้ระบบ แบบรายวัน </br>หรือตามตามความต้องการโดยการระบุวัน เวลา</li>
                                  <li>สามารถค้นหารายการเข้าใช้ระบบ</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-left">
                                  <br />
                                  <ul>
                                      <li>ข้อที่ 1</li><br />
                                      <br /><br />
                                      <li>ข้อที่ 1</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-center">
                                  ข้อที่ 3
                                </td>
                                <td class="col-md-1 text-center">
                                  <i class="icon-ok icon-2"></i>
                                </td>
                              </tr>

                              <tr >
                                 <td class="col-md-4 text-left">
                                  4.กระบวนการเปิดเผยข้อมูล
                                </td>
                                <td class="col-md-3 text-left">
                                  <i class="icon-tag icon-1"></i> บริหารการเปิดเผยข้อมูล <br/>
                                  <ul>
                                  <li>สามารถอนุมัติคำร้องการขอใช้ข้อมูลผ่านระบบ</li>
                                  <li>สามารถบันทึกคำร้องการขอใช้ข้อมูล</li>
                                  <li>สามารถค้นหาคำร้องการขอใช้ข้อมูล</li>
                                  <li>สามารถตรวจสอบสถานะการพิจารณาตามคำร้องขอใช้ข้อมูล</li>
                                  <li>สามารถแสดงรายการคำร้องการข้อใช้ข้อมูล</li>
                                  <li>สามารถแสดงรายงานคำขอใช้ข้อมูลที่ผ่านการพิจารณา</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-left">
                                  <br />
                                  <ul>
                                      <li>ข้อที่ 2</li>
                                      <li>ข้อที่ 2 - ข้อที่ 3</li>
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-center">
                                  ข้อที่ 6 และ ข้อที่ 7
                                </td>
                                <td class="col-md-1 text-center">
                                  <i class="icon-ok icon-2"></i>
                                </td>
                              </tr>

                              <tr >
                                 <td class="col-md-4 text-left">
                                  5.กระบวนการส่งต่อข้อมูล
                                </td>
                                <td class="col-md-3 text-left">
                                  <i class="icon-tag icon-1"></i> บริหารการส่งต่อข้อมูล<br/>
                                    <ul>
                                    <li>สามารถอนุมัติคำร้องการขอส่งต่อข้อมูลผ่านระบบ</li>
                                    <li>สามารถบันทึกคำร้องการส่งต่อข้อมูล</li>
                                    <li>สามารถค้นหาคำร้องการขอส่งต่อข้อมูล</li>
                                    <li>สามารถแสดงรายการคำร้องขอส่งต่อข้อมูล</li>
                                    <li>สามารถแสดงรายการที่ผ่านการพิจารณาส่งต่อข้อมูล</li>
                                    <li>สามารถตรวจสอบสถานะคำร้องขอส่งต่อข้อมูล</li>
                                    </ul>
                                </td>
                                <td class="col-md-2 text-left">
                                   <br />
                                  <ul>
                                      <li>ข้อที่ 2</li>
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li><br />
                                      <li>ข้อที่ 2 - ข้อที่ 3</li>
                                  </ul>
                                </td>
                                <td class="col-md-2 text-center">
                                  ข้อที่ 1 และ ข้อที่ 2
                                </td>
                                <td class="col-md-1 text-center">
                                  <i class="icon-ok icon-2"></i>
                                </td>
                              </tr>
                        </tbody>
                      </table>
                      <br />
                      *การเลิกใช้นโยบายเจ้าหน้าที่คลังสารสนเทศเพียงแต่ปฎิบัติหน้าที่แทน การยกเลิกต้องได้รับเอกสารจากผู้บริหาร
                    </div>
                      
            </div><!-- End All Privacy -->
    </div>

   
</div><!--/col-lg-12-->
@stop
