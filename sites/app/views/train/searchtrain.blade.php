
  <!-- Table -->
  <table id="result_search_training" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">ชื่อหลักสูตร</th>
        <th class="text-center">รายละเอียด</th>
        <th class="text-center">กลุ่มเป้าหมาย</th>
        <th class="text-center">สถานะหลักสูตร</th>
        <th class="text-center">วันที่สร้าง</th>
        <th class="text-center">วันสิ้นสุด</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @if(count($paginator) >=1)
      @foreach ($paginator as $key => $result)
          <tr>
            <td class="col-md-2">{{ $result->title }}</td>
            <td class="col-md-2">{{ $result->description }}</td>
            <td class="col-md-2 text-left">{{ $relate_role[$key] }}</td>
            <td class="col-md-2 text-left">
               @if($result->status)
                  <font color='green'>เปิด</font>
                @else
                  <font color='red'>ปิด</font>
                @endif
            </td>
            <td class="col-md-2 text-left">{{ Carbon::createFromTimeStamp(strtotime($result->created_at))->format('Y-m-d') }}</td>
           
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($result->closed_date))->format('Y-m-d') }}</td>
            <td class="col-md-1 text-center">
              <a  href="{{ URL::to('/training/edit' ) }}/{{ $result->id }}" class="btn btn-info btn">แก้ไข</a>
            </td>
          </tr>
      @endforeach
      @else
        <tr class="col-md-12"><td>ไม่พบข้อมูล</td></tr>
      @endif      
    </tbody>
  </table>

