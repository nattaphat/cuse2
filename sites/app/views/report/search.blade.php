  <script type="text/javascript">
//Function ajax list data

    $(".reportuser").click(function(event){
     event.preventDefault();
     var url = $('#urlmodal').val();
     var _url = url +'/'+$(this).attr('id');
     
     $.ajax({
       type: 'GET',
       url: _url,//"{{{ URL::to('content-policy' ) }}}",
       dataType: "html",
       success: function(data) {
         $(".modal-body").empty().html(data);
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert('Error occured!, ' + XMLHttpRequest);
       }
     });// end $.ajax
    });//end .nav-list a
</script>

  <!-- Table -->
  <table id="result_search_report" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center col-md-3">ไอพี</th>
        <th class="text-center col-md-3">โฮส</th>
        <th class="text-center col-md-2">ล่าสุด</th>
        <th class="text-center col-md-2">บทบาท</th>
        <th class="text-center col-md-2">ข้อมูล</th>
      </tr>
    </thead>
    <tbody>
    @if (count($paginator) >0)
      @foreach ($paginator as $key => $val)
      <input type="hidden" value="{{ URL::to('/')}}/peer/userprivacy" name="urlmodal" id="urlmodal">
          <tr>
            <td class="text-left col-md-3">
              {{$val['ip']}}
            </td>
            <td class="text-left col-md-3">
              {{$val['host']}}
            </td>
            <td class="text-center col-md-2">
              {{$val['last_visit']}}
            </td>
            <td class="text-left col-md-2">
            
              {{$val['role_name']}} (
              <a data-toggle="modal" href="#myModal" id="{{$val['user_id']}}" class="reportuser">{{$val['fname']}}
              </a>)
            </td>
            <td class="text-left col-md-2">
              {{$val['data_name']}}
            </td>
          </tr>
      @endforeach
    @else
      ไม่พบข้อมูล
    @endif
    </tbody>
  </table>

<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">ข้อมูลติดต่อ</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->