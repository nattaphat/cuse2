<script type="text/javascript">
$(document).ready(function()
{
  //Pagination ajax
  $(".pagination a").click(function()
  {
    var myurl = $(this).attr('href');
    //alert(myurl)
    $("#result_querydata").empty().html('<div align="center"><i class="icon-spinner icon-spin icon-large"></i><div>');
     $.ajax({
      type: 'GET',
      url: myurl,//"{{{ URL::to('content-policy' ) }}}",
      dataType: "html",
      success: function(data) {
        $("#result_querydata").empty().html(data);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert('Error occured!, ' + XMLHttpRequest);
      }
    });// end $.ajax
    return false;
  });//end pangination
});

$('#result_query_data_user').dataTable();
</script>

@if(count($paginator) > 0)
<!-- Table -->
  <table id="result_query_data_user" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center col-md-2">รหัสสถานี</th>
        <th class="text-center col-md-3">หน่วยงาน</th>
        <th class="text-center col-md-2">วันที่</th>
        <th class="text-center col-md-2">เวลา</th>
        <th class="text-center col-md-3">
          {{ $data_name }}
          {{$paginator[0]->unit}}
        </th>
      </tr>
    </thead>
    <tbody>

    	@foreach ($paginator as $val)
        {{--@if($val->$field_value < 500) --}}
            <tr>
              <td class="col-md-2 text-center">{{ $val->$teleid}}</td>
              <td class="col-md-3">{{ $val->agency_name}}</td>
              <td class="col-md-2 text-center">{{ Carbon::createFromTimeStamp(strtotime($val->$field_date))->format('Y-m-d'); }}</td>
              <td class="col-md-2 text-center">{{ Carbon::createFromTimeStamp(strtotime($val->$field_date))->format('H:m'); }}</td>
              <td class="col-md-3 text-center">
                {{ number_format($val->$field_value, 2, '.', '')}}
              </td>
            </tr>
          {{--@endif --}}
        @endforeach
    </tbody>
  </table>
<!--  -->
@else
No Data
@endif