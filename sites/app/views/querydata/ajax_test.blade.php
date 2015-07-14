<?php
	foreach ($paginator as $val){
		print '<pre>';
		print_r($val->tele_station_id);
		print_r($val->agency_name);
		print '<br>';
		//exit;
	}
?>
<script type="text/javascript">
$(document).ready(function()
{
	//Pagination ajax
	$(".pagination a").click(function()
	{
		var myurl = $(this).attr('href');
		alert(myurl)
		//  $.ajax({
		//   type: 'GET',
		//   url: myurl,//"{{{ URL::to('content-policy' ) }}}",
		//   dataType: "html",
		//   success: function(data) {
		//     $("#result_querydata").empty().html(data);
		//   },
		//   error: function(XMLHttpRequest, textStatus, errorThrown) {
		//     alert('Error occured!, ' + XMLHttpRequest);
		//   }
		// });// end $.ajax
		// return false;
	});//end pangination
});
</script>

  <table id="result_search_policy" class="table table-hover">
    <thead>
      <tr >
        <th class="text-center col-md-2">รหัสสถานี</th>
        <th class="text-center col-md-3">หน่วยงาน</th>
        <th class="text-center col-md-2">วันที่</th>
        <th class="text-center col-md-2">เวลา</th>
        <th class="text-center col-md-3"></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      
    	@foreach ($paginator as $val)
     
      @if($val->$field_value < 500)
          <tr>
            <td class="col-md-2">{{ $val->tele_station_id}}</td>
          </tr>
        @endif
        @endforeach
    </tbody>
  </table>
  @stop
<!--  -->
  <div id="pager">
    @include('slider')
  </dir>