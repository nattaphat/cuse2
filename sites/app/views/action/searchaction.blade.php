  <!-- Table -->
  <table id="result_search_action" class="table table-hover">
    <thead>
      <tr >
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อการกระทำ</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom() ?>
    @if(count($paginator) >=1)
      @foreach ($paginator as $action)
          <tr>
            <td class="col-md-1 text-center">
               {{ $item++ }}
            </td>
            <td class="col-md-8 text-left">
              {{ $action->action_name }}
            </td>
            <td class="col-md-2 text-center">
              <a href="{{ URL::to('action-edit' ) }}/{{ $action->id }}" class="btn btn-info btn">แก้ไข</a>
              <a href="{{ URL::to('action-del' ) }}/{{ $action->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบทิ้งข้อมูลนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    </tbody>
    @else
    ไม่พบข้อมูล
    @endif
  </table>
</div>
