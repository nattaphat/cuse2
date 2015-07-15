<script type="text/javascript">
//Function ajax list data

    $(".userlist").click(function(event){
     event.preventDefault();
     var url = $('#urlusermodal').val();
     var _url = url +'/'+$(this).attr('id');
     
     $.ajax({
       type: 'GET',
       url: _url,//"{{{ URL::to('content-policy' ) }}}",
       dataType: "html",
       success: function(data) {
         $(".user-modal-body").empty().html(data);
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert('Error occured!, ' + XMLHttpRequest);
       }
     });// end $.ajax
    });//end .nav-list a


    $(".agencylist").click(function(event){
     event.preventDefault();
     var url = $('#urldatamodal').val();
     var _url = url +'/'+$(this).attr('id');
     
     $.ajax({
       type: 'GET',
       url: _url,//"{{{ URL::to('content-policy' ) }}}",
       dataType: "html",
       success: function(data) {
         $(".agency-modal-body").empty().html(data);
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert('Error occured!, ' + XMLHttpRequest);
       }
     });// end $.ajax
    });//end .nav-list a

</script>
@if(count($result) > 0)
<!-- Table -->
  <table id="result_search_userlist" class="table table-hover table-bordered">
    <thead>
      <tr class="active">
        <th class="text-center">รหัส</th>
        <th class="text-center">หน่วยงาน</th>
<!--         <th class="text-center">Agency Status</th>
        <th class="text-center">Status of pulic data</th> -->
        <th class="text-center">ติดต่อ</th>
      </tr>
    </thead>
    <tbody>
      <input type="hidden" value="{{ URL::to('/')}}/peer/userprivacy" name="urlusermodal" id="urlusermodal">
      <input type="hidden" value="{{ URL::to('/')}}/peer/dataprivacy" name="urldatamodal" id="urldatamodal"><?php $i=1;?>
        @foreach ($result as $datainfo)  
            <tr>
              <td class="text-center col-md-1">
                 {{ $i++}}
              </td>
              <td class="col-md-7 text-left">
                <a data-toggle="modal" href="#agencyModal" id="{{$datainfo->agency_id}}" class="agencylist" >{{ $datainfo->agency_name }}</a>
              </td>
              <td class="col-md-4 text-left">
                @if($datainfo->fname)
                    <a data-toggle="modal" href="#userModal" id="{{$datainfo->user_id}}" class="userlist">{{ $datainfo->fname }} </a>
                  @else
                    n/a
                  @endif
              </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@else
  ไม่พบข้อมูล
@endif
  <!-- Modal -->
  <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">ข้อมูลติดต่อ</h4>
          </div>
          <div class="user-modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Modal -->
  <div class="modal fade" id="agencyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">ข้อมูลหน่วยงาน</h4>
          </div>
          <div class="agency-modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->