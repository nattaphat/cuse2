

  <!-- Table -->
  <table id="policyduty_search" class="table table-hover">
    <thead>
      <tr >
        <th class="text-center">ลำดับ</th>
        <th class="text-center">ชื่อ</th>
        <th class="text-center">นามสกุล</th>
        <th class="text-center">ตำแหน่ง</th>
        <th class="text-center">เบอร์ติดต่อ</th>
        <th class="text-center">อีเมล</th>
        <th class="text-center">วันที่เพิ่ม</th>
        <th class="text-center">สถานะ</th>
        <th class="text-center"></th>
        <th></th>
      </tr>
    </thead>
    @if( count($paginator) > 0 )
    <tbody><?php $i = $paginator->getFrom() ?>
        @foreach ($paginator as $key => $val)
          <tr>
            <td class="col-md-1 text-center">{{ $i++ }}</td>
            <td class="col-md-1 text-center">{{$val->fname}}</td>
            <td class="col-md-2 text-center">{{$val->lastname}}</td>
            <td class="col-md-2 text-center">{{$val->position}}</td>
            <td class="col-md-2 text-center">{{$val->tel}}</td>
            <td class="col-md-1 text-center">{{$val->email}}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($val->created_at))->format('Y-m-d'); }}</td>
            <td class="col-md-1 text-center">
            @if($val->status)
              <font color="green">เปิดใช้งาน</font>
            @else
              <font color="red">ระงับใช้งาน</font>
            @endif
            </td>
            <td class="col-md-1">
              <a  href="{{ URL::to('/policyduty/edit' ) }}/{{ $val->id }}" class="btn btn-info btn-sm">แก้ไข</a>
            </td>
          </tr>
        @endforeach
    </tbody>
    @else
      <tbody>
          <tr>
            <td class="col-md-1">
               ไม่พบข้อมูล
            </td>
            
          </tr>
      </tbody>
        
    @endif 
  </table>
</div>
  
@if( count($paginator) > 0 )
<div id="pager">
  @include('slider')
</div>
@endif


