<script type="text/javascript">
//Function ajax list data

    $(".rolelist").click(function(event){
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
@if(count($paginator) >=1)
  <table id="result_search_userlist" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">ลำดับ</th>
        <th class="text-center">ชื่อผู้ใช้งาน</th>
      </tr>
    </thead>
    <tbody><?php $item = $paginator->getFrom(); ?>
      <input type="hidden" value="{{ URL::to('/')}}/peer/userprivacy" name="urlmodal" id="urlmodal">
      @foreach ($paginator as $user)
        @if( ($user->user_id !=1 ) AND ($user->user_status =='yes') )
          <tr>
            <td class="text-center col-md-1">
               {{ $item++}}
            </td>
            <td class="col-md-11 text-center">
              <!-- Button trigger modal -->
              <a data-toggle="modal" href="#myModal" id="{{$user->user_id}}" class="rolelist">{{ $user->fname }}</a> 
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
@else
  ไม่พบข้อมูล
@endif

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
