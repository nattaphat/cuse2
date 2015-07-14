<div >

	<form class="form-horizontal" role="form">
  @if(isset($data_info))
      @foreach($data_info as $key => $value)
    	 <div class="form-group">
            <label for="inputPassword1" class="col-lg-5 control-label">{{ $value['data_name'] }}:</label>
            <div class="col-lg-4">
              <div >
              		@if($agency_dataprivacy[$value['id']]->status)
                  		เปิดเผย
                  	@else
                  		n/a
                  	@endif
              </div>
            </div>
        </div>
      @endforeach
  @endif
</form>
		
 </div><!--/col-lg-12-->