  <!-- Table -->
  <table id="result_search_condition" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อเงื่อนไข</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom() ?>
    @if(count ($paginator) )
      @foreach ($paginator as $condition)
          <tr>
            <td class="col-md-1 text-center">
               {{ $item++ }}
            </td>
            <td class="col-md-8 text-left">
              {{ $condition->cond_name }}
            </td>
            <td class="col-md-2 text-center">
              <a href="{{ URL::to('condition-edit' ) }}/{{ $condition->id }}" class="btn btn-info btn">แก้ไข</a>
              <a href="{{ URL::to('condition-del' ) }}/{{ $condition->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบทิ้งชื่อเงื่อนไขใช่หรือไม ?')">ลบทิ้ง</a>
            </td>
          </tr>
      @endforeach
    </tbody>
    @else
      ไม่พบข้อมูล
  @endif
  </table>