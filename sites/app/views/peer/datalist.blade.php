@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li><a href=" {{ URL::to('admin')}}">หน้าหลัก</a></li>
  <li class="active">ค้นหา</li>
  <li class="active">ค้นหาตามชื่อข้อมูล</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงรายการข้อมูล</div>
  <div class="panel-body">
    <p></p>
  </div>
  
  <div class="col-md-4 input-group">
    <form class="form-inline" role="form">
      <div class="form-group">
        <select class="form-control" name="peerdata-list" id="peerdata-list">
           @foreach ($all_data as $key => $val)
          <?php //$tbname_arr = explode(":", $val->table_name)?>
            <option value="{{ $val->id }}">{{$val->data_name}}</option>
          @endforeach
        </select>
      </div>
        <a  href="{{ URL::to('/peer/datalist' ) }}" class="btn btn-default btn-sm peerdata">ค้นหา</a>
    </form>

  </div>
  <br />
  <br />
  <br />
  <br />
  <!-- Table -->
  <table id="result_peerdata" class="table table-hover">

    
  </table>
</div>
@stop

@section ('bodyjs')
  @parent
  <!-- Custom js for this template -->
 <script type="text/javascript">
  $(document).ready(function()
  {
      $(".peerdata").click(function(event){
        
        $("#result_peerdata").html('<div align="center"><i class="icon-spinner icon-spin icon-large"></i><div>');
         event.preventDefault();
         var id = $('#peerdata-list').val();
         var _url = $(this).attr('href')+'/'+id;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_peerdata").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a
  });

  </script>
@stop