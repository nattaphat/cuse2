
<!-- Table -->
@if(count($agency_dataprivacy) >=1)
  <table id="result_search_userlist" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">ลำดับ</th>
        <th class="text-center">ชื่อข้อมูล</th>
        <th class="text-center">สถานะข้อมูล</th>
        <th class="text-center">วันสุดท้ายที่เก็บข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      
      <? $i=1; ?>
      @foreach ($agency_dataprivacy as $key => $agency)
          <tr>
            <td class="text-center col-md-1">
               {{ $i++}}
            </td>
            <td class="col-md-2">
               {{ $agency->data_name}}
            </td>
            <td class="col-md-2 text-left">
              @if($agency->privacy)
                <font color="green">อนุญาตให้ร้องขอ</font>
              @else
                ไม่อนุญาตให้ร้องขอ
              @endif  
            </td>
            <td class="col-md-2 text-center">
              {{ Carbon::createFromTimeStamp(strtotime($agency->period))->format('Y-m-d'); }}
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
@else
  ไม่พบข้อมูล
@endif