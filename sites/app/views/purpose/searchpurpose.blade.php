  <!-- Table -->
  <table id="result_search_purpose" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อวัตถุประสงค์</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom() ?>
    @if( count($paginator) >=1)
      @foreach ($paginator as $purpose)
          <tr>
            <td class="col-md-1">
               {{ $purpose->id }}
            </td>
            <td class="col-md-8 text-left">
              {{ $purpose->purp_name }}
            </td>
            <td class="col-md-2 text-center">
              <a href="{{ URL::to('purpose-edit' ) }}/{{ $purpose->id }}" class="btn btn-info btn">แก้ไข</a>
              <a href="{{ URL::to('purpose-del' ) }}/{{ $purpose->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบทิ้งวัตถุประสงค์ใช่หรือไม่ ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    </tbody>
    @else
      ไม่พบข้อมูล
    @endif
  </table>