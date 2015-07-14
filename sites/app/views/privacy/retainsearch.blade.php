<script type="text/script"> 
  $('#result_search_report').dataTable();
</script>
<!-- Table -->
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
  @foreach ($rs as $key => $val)
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
