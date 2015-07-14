  <!-- Table -->
    <table id="result_search_obligation" class="table table-hover table-bordered">
    <thead>
      <tr >
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อข้อผูกพัน</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom() ?>
    @if(count($paginator) >=1)
      @foreach ($paginator as $obligation)
          <tr>
            <td class="col-md-1 text-center">
               {{ $item++ }}
            </td>
            <td class="col-md-8 text-left">
              {{ $obligation->obl_name }}
            </td>
            <td class="col-md-2 text-center">
              <a href="{{ URL::to('obligation-edit' ) }}/{{ $obligation->id }}" class="btn btn-info btn">แก้ไข</a>
              <a href="{{ URL::to('obligation-del' ) }}/{{ $obligation->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบข้อผูกพันนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    @else
      ไม่พบข้อมูล
    @endif
    </tbody>
  </table>