<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>
  <body>
  

          <!-- Container -->
          <div class="container">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">แผงออกรายงาน-ตามบทบาท</div>
              <div class="panel-body">
                <p>
                  @if(count($rs) > 0)
                  ชื่อบทบาท: {{$rs[0]->rolename}}</br>
                  @endif
                </p>
              </div>

              </br>
              <!-- Table -->
                <table id="result_reportman_report" class="table table-hover table-bordered">
                <thead>
                  <tr >
                    <th class="text-center col-md-2">ชื่อหลักสูตร</th>
                    <th class="text-center col-md-4">รายละเอียด</th>
                    <th class="text-center col-md-2">การเข้าร่วม</th>
                    <th class="text-center col-md-2">วันที่สร้าง</th>
                    <th class="text-center col-md-2">วันที่สิ้นสุด</th>
                  </tr>
                </thead>
                <tbody>
                  @if ( count($rs) > 0)
                    @foreach ($rs as $key => $val)
                      <tr>
                        <td class="col-md-2">
                           {{$val->title}}
                        </td>
                        <td class="col-md-2">
                          {{$val->description}}
                        </td>
                        <td class="col-md-2">
                          {{$val->date_time_att}}
                        </td>
                        <td class="col-md-2">
                          {{$val->start_training_date}}
                        </td>
                        <td class="col-md-2">
                          {{$val->closed_date}}
                        </td>
                      </tr>
                    @endforeach
                  @else
                    ไม่พบข้อมูล
                  @endif
                </tbody>
              </table>

            </div>
          </div> <!-- /container -->  
    </div><!-- Wrap all page content here -->

  </body>
</html>





