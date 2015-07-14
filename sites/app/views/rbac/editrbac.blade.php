@extends('layouts.admin')

@section ('admincontent')

{{ App::setLocale('en'); }}

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{ URL::to('policy-content') }}">นโยบายคลังฯ</a></li>
  <li><a href="{{ URL::to('/policy-rbac/') }}/{{ $results['policy']->id}}">อาร์บีเอซี</a></li>
  <li class="active">แปลงนโยบายตามหลักอาร์บีเอซี / แก้ไขรหัส:{{ $results['policy']->id }}</li>
</ol>
<div id="restRole">

</div>
	<ul class="errors">
	  @foreach($errors->all('<li>:message</li>') as $message)
	    {{ $message }}
	  @endforeach
	 </ul>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">แผงอาร์บีเอซี/นโยบายคลังฯ</div>
  <div class="panel-body">
    <p>
    	{{ Form::textarea("policy-text", $results['policy']->policy_content ,[
                  "id"=>"policy-text",
                  "readonly"=>true,
                  "placeholder" => "เนื้อหานโยบาย",
                  "rows"=>"10",
                  "cols"=>"2",
                  "class"=>"form-control"
        ]) }}
    </p>
  </div>
  
	
	<br />
@if($rbac_data['total'] > 0)
	{{ Form::open([
      "route" =>array('policyrbac_saveedit', $results['policy']->id),
      "autocomplete" => "off",
      "class"=>"form-horizontal"
    ])}}
	  <div class="form-group">
	    <label for="inputEmail1" class="col-lg-2 control-label">บทบาท</label>
	    <div class="col-lg-4">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="form-control" multiple="multiple" name="rbac_role[]" size="6">

			    @foreach ($results['role'] as $role)
			    	<option value="{{ $role->id }}"
			    		@if (in_array($role->id,$rbac_data['rbac_role']['id'])) 
			    		selected="selected"
			    		@endif
			    	>
			    		{{ $role->role_name }}
			    	</option>
			    @endforeach
			  
			  </select>
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">ข้อมูล</label>
	    <div class="col-lg-4">
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="form-control" multiple="multiple" name="rbac_data[]" size="11">
			    @foreach ($results['data'] as $data)
			    	<option value="{{ $data->id }}"
			    		@if (in_array($data->id,$rbac_data['rbac_data']['id'])) 
			    		selected="selected"
			    		@endif
			    		>
			    		{{ $data->data_name }}
			    	</option>
			    @endforeach
			  </select>
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">การกระทำ</label>
	    <div class="col-lg-4">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="form-control" multiple="multiple" name="rbac_action[]" size="7">
			    @foreach ($results['action'] as $action)
			    	<option value="{{ $action->id }}"
			    	@if (in_array($action->id,$rbac_data['rbac_action']['id'])) 
			    		selected="selected"
			    		@endif
			    	>
			    		{{ $action->action_name }}
			    	</option>
			    @endforeach
			  </select>
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">วัตถุประสงค์</label>
	    <div class="col-lg-4">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="form-control" multiple="multiple" name="rbac_purpose[]" size="4">
			    @foreach ($results['purpose'] as $purp)
			    	<option value="{{ $purp->id }}"
			    	@if (in_array($purp->id,$rbac_data['rbac_purp']['id'])) 
			    		selected="selected"
			    		@endif
			    	>
			    		{{ $purp->purp_name }}
			    	</option>
			    @endforeach
			  </select>
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">เงื่อนไข</label>
	    <div class="col-lg-4">
	      	
	      	<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="form-control" multiple="multiple" name="rbac_condition[]" size="9">
			    @foreach ($results['condition'] as $cond)
			    	<option value="{{ $cond->id }}"
			    	@if (in_array($cond->id,$rbac_data['rbac_cond']['id'])) 
			    		selected="selected"
			    		@endif
			    	>
			    		{{ $cond->cond_name }}
			    	</option>
			    @endforeach
			  </select>
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">ข้อผูกพัน</label>
	    <div class="col-lg-4">
	      	
	      	<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="form-control" multiple="multiple" name="rbac_obligation[]" size="2">
			    @foreach ($results['obligation'] as $obl)
			    	<option value="{{ $obl->id }}"
			    	@if (in_array($obl->id,$rbac_data['rbac_obl']['id'])) 
			    		selected="selected"
			    	@endif
			    	>
			    	{{ $obl->obl_name }}
			    	</option>
			    @endforeach
			  </select>
			</div>
			
	    </div>
	  </div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary save-policy" >บันทึกการเปลี่ยนแปลง</button>
	</div>
{{ Form::close() }}
@endif
</div>
@stop