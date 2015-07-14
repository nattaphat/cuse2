  <?
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=data.csv ");
header("Content-Transfer-Encoding: binary ");
  ?>

  <!-- Table -->
  <table id="result_search_report" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center col-md-3">ไอพี</th>
        <th class="text-center col-md-3">โฮส</th>
        <th class="text-center col-md-2">ล่าสุด</th>
        <th class="text-center col-md-2">บทบาท</th>
        <th class="text-center col-md-2">ข้อมูล</th>
      </tr>
    </thead>
    <tbody>
    @if (count($paginator) >0)
      @foreach ($paginator as $key => $val)
      <input type="hidden" value="{{ URL::to('/')}}/peer/userprivacy" name="urlmodal" id="urlmodal">
          <tr>
            <td class="text-left col-md-3">
              {{$val['ip']}}
            </td>
            <td class="text-left col-md-3">
              {{$val['host']}}
            </td>
            <td class="text-center col-md-2">
              {{$val['last_visit']}}
            </td>
            <td class="text-left col-md-2">
            
              {{$val['role_name']}} (
              <a data-toggle="modal" href="#myModal" id="{{$val['user_id']}}" class="reportuser">{{$val['fname']}}
              </a>)
            </td>
            <td class="text-left col-md-2">
              {{$val['data_name']}}
            </td>
          </tr>
      @endforeach
    @else
      ไม่พบข้อมูล
    @endif
    </tbody>
  </table>