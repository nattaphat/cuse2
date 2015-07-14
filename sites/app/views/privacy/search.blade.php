<!-- Table -->
<table id="result_search_initprivacy" class="table table-hover">
  <thead>
    <tr >
      <th class="text-center">ชื่อ</th>
      <th class="text-center">สถานะ</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
        <tr>
          <td class="col-md-2">

          </td>
          <td class="col-md-8 text-left">

          </td>
          <td class="col-md-2">
            <a href="{{ URL::to('purpose-edit' ) }}/" class="btn btn-info btn-sm">แก้ไข</a>
            <a href="{{ URL::to('purpose-del' ) }}/" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการลบทิ้งวัตถุประสงค์ใช่หรือไม่ ?')">ลบทิ้ง</a>
          </td>
        </tr>

  </tbody>
</table>
</div>
