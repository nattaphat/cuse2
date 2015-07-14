  @if ( count($rs) > 0)
  <div class="col-md-12 padding-top text-right">
    <?php
      $start = str_replace(array(":"),"_",$dt_start);
      $start = str_replace(array(" "),"*",$start);
      
      $end = str_replace(array(":"),"_",$dt_end);
      $end = str_replace(array(" "),"*",$end);
    ?>
    <a href="{{ URL::to('/training/date/report/') }}/{{$start}}/{{$end}}/yes/reportdate" class="btn btn-success exportxls">xls
    </a>

  </div>

  @endif
  <br />

  <script type="text/javascript">
    $('#result_datereport').dataTable();
  </script>
  <table id="result_datereport" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center col-md-2">ชื่อหลักสูตร</th>
        <th class="text-center col-md-4">รายละเอียด</th>
        <th class="text-center col-md-2">การเข้าร่วม</th>
        <th class="text-center col-md-2">วันที่สร้าง</th>
        <th class="text-center col-md-2">วันที่สิ้นสุด</th>
      </tr>
    </thead>
    <tbody>
      @if ( count($rs) > 0)
        @foreach ($rs as $key => $val)
          <tr>
            <td class="col-md-2">
               {{$val->title}}
            </td>
            <td class="col-md-2">
              {{$val->description}}
            </td>
            <td class="col-md-2">
              {{$val->date_time_att}} <br />({{$val->fname.' '.$val->lname.':'.$val->agency_name}})
            </td>
            <td class="col-md-2">
              {{$val->start_training_date}}
            </td>
            <td class="col-md-2">
              {{$val->closed_date}}  
            </td>
          </tr>
        @endforeach
      @else
        ไม่พบข้อมูล
      @endif
    </tbody>
  </table>

    <script type="text/javascript" >
      //report search
        // $(".exportxls").click(function(event){
        //  event.preventDefault();

        //   var sdt = $('#sdt').val();
        //   var edt = $('#edt').val();
        //   var _url = $(this).attr('href')+'/'+encodeURIComponent(sdt)+'/'+encodeURIComponent(edt)+'/yes/'+'reportdate';
        //   //console.log(_url)
        //  $.ajax({
        //    type: 'get',
        //    url: _url,//"{{{ URL::to('content-policy' ) }}}",
        //    dataType: "html",
        //    success: function(data) {
        //      //$("#result_search_report").empty().html(data);
        //      console.log('success')
        //    },
        //    error: function(XMLHttpRequest, textStatus, errorThrown) {
        //      alert('Error occured!, ' + XMLHttpRequest);
        //    }
        //  });// end $.ajax
        // });//end .nav-list a
    </script>
