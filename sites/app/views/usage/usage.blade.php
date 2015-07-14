@extends('layouts.admin')
@section ('bodyjs')
  @parent
  <!-- Custom js for this template -->
  <script type="text/javascript">
    $(document).ready(function(){
        getData();
        getRole();
    });

    function getData() {
        $.ajax({
            type: 'GET',
            url: $('#data_url').val(),
            //data: $('#frm_criteria').serialize(),
            dataType: "html",
            timeout: 15000,
            beforeSend: function() {
                //$('#progress').html('<img src="images/loading.gif">'); 
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('Error occured!, ' + textStatus);
            },
            success: function(data) {
                //$('#progress').html('');
                zingchart.render({
                    'id' : 'usage_chart_data',
                    'width' : "100%",
                    'height' : 280,
                    'data' : data
                });
                //$('#usage_chart').html(data);
            }
        });
    }

    function getRole() {
        $.ajax({
            type: 'GET',
            url: $('#role_url').val(),
            //data: $('#frm_criteria').serialize(),
            dataType: "html",
            timeout: 15000,
            beforeSend: function() {
                //$('#progress').html('<img src="images/loading.gif">'); 
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('Error occured!, ' + textStatus);
            },
            success: function(data) {
                //$('#progress').html('');
                zingchart.render({
                    'id' : 'usage_chart_role',
                    'width' : "100%",
                    'height' : 280,
                    'data' : data
                });
                //$('#usage_chart').html(data);
            }
        });
    }
    </script>
@stop

@section ('admincontent')
<ol class="breadcrumb">
  <li><a href="#">หน้าหลัก</a></li>
  <li><a href="#">สถิติและรายงาน</a></li>
  <li class="active">สถิติ</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงสถิติ</div>
    <div class="panel-body">
    <p></p>
    </div>
    <input type="hidden" value="{{ route('role_chart') }}" id="role_url" name="role_url">
    <input type="hidden" value="{{ route('data_chart') }}" id="data_url" name="data_url">

    <!-- Chart -->
      <div class="form-group">
        <div id="usage_chart_data">
      </div>
      <div class="form-group">
         <div id="usage_chart_role">
      </div>

  </div>

</div>

@stop
