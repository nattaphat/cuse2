  <!-- Table -->
  <table id="result_search_requestlist" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">*ข้อมูลที่ร้องขอ</th>
        <th class="text-center">ความถี่ข้อมูล</th>
        <th class="text-center">สถานะการร้องขอ</th>
        <th class="text-center">*วัตถุประสงการขอ</th>
        <th class="text-center">*ผู้อนุมัติ</th>
        <th class="text-center">*หน่วยงานข้อมูล</th>
        <th class="text-center">วันที่อนุมัติ</th>
        <th class="text-center">วันที่ร้องขอ</th>
        <th class="text-center">หมายเหตุ</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if(count($paginator) > 0)
      @foreach ($paginator as $result)
          <tr>
            <td class="col-md-2">{{ $result->data_name }}</td>
            <td class="col-md-2 text-left">{{ $result->cond_name }}</td>
            <td class="col-md-2 text-left">
               @if($result->req_status)
                  <font color='green'>ยินยอมการร้องขอ</font>
                @else
                  <font color='red'>อยู่ระหว่างพิจารณา</font>
                @endif
            </td>
            <td class="col-md-2 text-left">{{ RequestDataType::find($result->req_type)->type_name }}</td>
            <td class="col-md-2 text-left">{{ Usernhc::find($result->app_userid)->fname }}  {{ Usernhc::find($result->app_userid)->lname }} ({{$result->role_name}})</td>
            <td class="col-md-2 text-left">{{$result->agency_name}}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($result->updated_at))->format('Y-m-d'); }}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($result->created_at))->format('Y-m-d'); }}</td>
            
            <td class="col-md-1">
              @if(!$result->downloaded)
              <a  href="{{ URL::to('/reqdata/resultlist/download' ) }}/{{ $result->id }}" class="btn btn-info btn-sm">ดาวน์โหลด</a>
              @else
                เสร็จสิ้น
              @endif
            </td>
          </tr>
      @endforeach
      @else
      <tr class="col-md-12"><td>ไม่พบข้อมูล</td></tr>
      @endif
    </tbody>
  </table>
