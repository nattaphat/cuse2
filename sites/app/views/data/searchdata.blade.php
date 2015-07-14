
  <table id="result_search_data" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">ชื่อข้อมูล</th>
        <th></th>
      </tr>
    </thead>
    <tbody><?php $item =  $paginator->getForm() ?>
      @if(count($paginator) >= 1)
        @foreach ($paginator as $data)
            <tr>
              <td class="col-md-1 text-center">
                 {{ $item++ }}
              </td>
              <td class="col-md-8 text-left">
                {{ $data->data_name }}
              </td>
              <td class="col-md-2 text-center">
                <a href="{{ URL::to('data-edit' ) }}/{{ $data->id }}" class="btn btn-info btn">แก้ไข</a>
                <a href="{{ URL::to('data-del' ) }}/{{ $data->id }}" class="btn btn-danger btn" onclick="return confirm('ท่านต้องการลบชื่อข้อมูลนี้ใช้หรือไม่ ?')">ลบทิ้ง</a>
              </td>
            </tr>
        @endforeach
    </tbody>
      @else
        ไม่พบข้อมูล
      @endif
  </table>
</div>
