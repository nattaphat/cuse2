<form role="form" id="add_agency_data" name="add_agency_data">
      <!-- Table -->
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="active">
            <th class="text-center">#</th>
            <th class="text-center">ชื่อข้อมูล</th>
          </tr>
        </thead>
        <tbody>
        @if(count($agency_data) > 0)
          @foreach ($agency_data as $data)
              <tr>
                <td class="col-md-1 text-center">
                   <!-- <input type="checkbox" id="agenc_data[]" name="agency_data[]" value="{{ $data->id }}"> -->
                </td>
                <td class="col-md-11 text-left">
                  {{ $data->data_name }}
                </td>
              </tr>
          @endforeach
        @else
            No Data.
        @endif
        </tbody>
      </table>
    
  </form>
  
  