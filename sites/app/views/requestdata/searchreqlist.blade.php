  <!-- Table -->
  <table id="result_search_reqdata" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">*ข้อมูลที่ร้องขอ</th>
        <th class="text-center">ความถี่ข้อมูล</th>
        <th class="text-center">สถานะการร้องขอ</th>
        <th class="text-center">วัตถุประสงการขอ</th>
        <th class="text-center">*ผู้ร้องขอ</th>
        <th class="text-center">*หน่วยงานผู้ร้องขอ</th>
        <th class="text-center">วันที่ร้องขอ</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if(count($paginator) > 0)
      @foreach ($paginator as $req)
          <tr>
            <td class="col-md-2">{{ $req->data_name }}</td>
            <td class="col-md-2 text-left">{{ $req->cond_name }}</td>
            <td class="col-md-2 text-left">
               @if($req->req_status)
                  <font color='green'>ยินยอมการร้องขอ</font>
                @else
                  <font color='red'>อยู่ระหว่างพิจารณา</font>
                @endif
            </td>
            <td class="col-md-2 text-left">{{ RequestDataType::find($req->req_type)->type_name }}</td>
            <td class="col-md-2 text-left">{{ $req->fname }} {{ $req->lname}} ({{$req->role_name}})</td>
            <td class="col-md-2 text-left">{{ Agency::find($req->send_agencyid)->tname }}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($req->created_at))->format('Y-m-d'); }}</td>
            <td class="col-md-1">
              @if(!$req->req_status)
                <a  href="{{ URL::to('/reqdata/reqlist/edit' ) }}/{{ $req->id }}" class="btn btn-info btn-sm">Edit</a>
              @endif
            </td>
          </tr>
      @endforeach
      @else
      <tr class="col-md-12"><td>ไม่พบข้อมูล</td></tr>
      @endif
    </tbody>
  </table>

