  <!-- Table -->
  <table id="result_search_userlist" class="table table-hover">
    <thead>
      <tr >
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อผู้ใช้</th>
        <th class="text-center">นามสกุล</th>
        <th class="text-center">บทบาท</th>
        <th class="text-center">วันที่ลงทะเบียน</th>
        <th class="text-center">ประเภทผู้ใช้</th>
        <th class="text-center">สถานะ</th>
        <th class="text-center"></th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = 1 ?>
    @if(count($paginator) >=1)
      @foreach ($paginator as $user)
        @if($user->user_id !=1)
          <tr 
            @if($user->user_status !='yes')
              class="warning"
            @else
              class="success"
            @endif  
          >
            <td class="col-md-1">
               {{ $user->user_id }}
            </td>
            <td class="col-md-2 text-left">{{ $user->fname }}</td>
            <td class="col-md-2 text-left">{{ $user->lname }}</td>
            <td class="col-md-3 text-left">{{ $user->role_name }}</td>
            <td class="col-md-1 text-left">{{ Carbon::createFromTimeStamp(strtotime($user->created_at))->format('Y-m-d'); }}</td>
            <td class="col-md-1 text-left">
                @if($user->grp_id == 2)
                  Admin
                @else
                  User
                @endif
            </td>
            <td class="col-md-1 text-left">
              @if($user->user_status == 'yes')
                เปิดใช้งาน
              @else
                ปิดการใช้งาน
              @endif
            </td>
            <td class="col-md-1">
              <a  href="{{ URL::to('/userlist/approval' ) }}/{{ $user->user_id }}" class="btn btn-info btn-sm">แก้ไข</a>
            </td>
          </tr>
        @endif
      @endforeach
    @else
      ไม่พบข้อมูล
    @endif
    </tbody>
  </table>