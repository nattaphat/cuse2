@extends('layouts.admin')

@section ('admincontent')

{{ App::setLocale('en'); }}

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="{{ URL::to('policy-content') }}">Policy</a></li>
  <li class="active">Policy to RBAC / Id:{{ $results['policy']->id }}</li>
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
  <div class="panel-heading">Policy to RBAC</div>
  <div class="panel-body">
    <p>
    	{{ Form::textarea("policy-text", $results['policy']->policy_content ,[
                  "id"=>"policy-text",
                  "readonly"=>true,
                  "placeholder" => "Poicy Content",
                  "rows"=>"10",
                  "cols"=>"2",
                  "class"=>"form-control"
        ]) }}
    </p>
  </div>
	@if($rbac_data['total'] > 0)
	<div class="col-lg-12">
		<table class="table">
        <thead>
          <tr>
            <th>{{ trans('nhc.role'); }}</th>
            <th>Data</th>
            <th>Action</th>
            <th>Purpose</th>
            <th>Condition</th>
            <th>Oligation</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="col-md-1">1</td>
            <td class="col-md-2">Mark</td>
            <td class="col-md-1">Otto</td>
            <td class="col-md-2">Otto</td>
            <td class="col-md-2">Otto</td>
            <td class="col-md-2">Otto</td>
            <td class="col-md-2">
            	<a  href="{{ URL::to('policy-rbac/edit' ) }}/{{ $results['policy']->id }}" class="btn btn-info btn-sm">Edit</a>
              	<a href="{{ URL::to('policy-del' ) }}/" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to remove this policy ?')">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
	</div>
	@endif
	<br />
	<br />
	<br />
	{{ Form::open([
      "route" =>array('policyrbac_save', $results['policy']->id),
      "autocomplete" => "off",
      "class"=>"form-horizontal"
    ])}}
	  <div class="form-group">
	    <label for="inputEmail1" class="col-lg-2 control-label">*Role</label>
	    <div class="col-lg-6">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_role[]">

			    @foreach ($results['role'] as $role)
			    	<option value="{{ $role->id }}">{{ $role->role_name }}</option>
			    @endforeach
			  
			  </select>
			  <a  href="{{ URL::to('role-add' ) }}" class="btn btn-success">Add Role</a>
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">*Data</label>
	    <div class="col-lg-8">
	      		
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_data[]">
			    @foreach ($results['data'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->data_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('data-add' ) }}" class="btn btn-success">Add Data</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">*Action</label>
	    <div class="col-lg-6">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_action[]">
			    @foreach ($results['action'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->action_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('action-add' ) }}" class="btn btn-success">Add Action</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">*Purpose</label>
	    <div class="col-lg-6">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_purpose[]">
			    @foreach ($results['purpose'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->purp_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('purpose-add' ) }}" class="btn btn-success">Add Purpose</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">*Condition</label>
	    <div class="col-lg-6">
	      	
	      	<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_condition[]">
			    @foreach ($results['condition'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->cond_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('condition-add' ) }}" class="btn btn-success">Add Condition</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">*Obligation</label>
	    <div class="col-lg-6">
	      	
	      	<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_obligation[]">
			    @foreach ($results['obligation'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->obl_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('obligation-add' ) }}" class="btn btn-success">Add Obligation</a>		
			</div>
			
	    </div>
	  </div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary save-policy" >Save RBAC</button>
	</div>
{{ Form::close() }}
</div>
@stop