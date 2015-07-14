  @if ( count($rs) > 0)
  <div class="col-md-12 padding-top text-right">
      <a href="{{ URL::to('/training/man/report/' ) }}/{{$userid}}/yes/reportman" class="btn btn-success export-pdf">csv
              </a>
  </div>
  @endif
  </br>
  <script type="text/javascript">
    $('#result_manreport').dataTable();
  </script>
  <table  id="result_manreport" name="result_manreport" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
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