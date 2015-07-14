@extends('layouts.admin')

@section ('admincontent')

{{ App::setLocale('th'); }}

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li><a href="{{ URL::to('policy-content') }}">นโยบายคลังฯ</a></li>
  <li class="active">แปลงนโยบายตามหลักอาร์บีเอซี / นโยบายคลังรหัส: {{ $results['policy']->id }}</li>
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
                  "placeholder" => "Poicy Content",
                  "rows"=>"10",
                  "cols"=>"2",
                  "class"=>"form-control"
        ]) }}
    </p>
  </div>
  

	@if($rbac_data['total'] > 0)
	<div class="col-md-12 padding-top text-right">
	    <a  href="{{ URL::to('policy-rbac/edit' ) }}/{{ $results['policy']->id }}" class="btn btn-info btn-sm">แก้ไข</a>
		<a href="{{ URL::to('policy-rbac/del' ) }}/{{ $results['policy']->id }}" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการลบทิ้งนโยบายการใช้งานคลังฯ ใช่หรือไม่ ?')">ลบทิ้ง</a>
  	</div>
	<div class="col-lg-12">
		<table class="table table-hover">
        <thead>
          <tr>
            <th>{{ trans('nhc.role'); }}</th>
            <th>ข้อมูล</th>
            <th>การกระทำ</th>
            <th>วัตถุประสงค์</th>
            <th>เงื่อนไข</th>
            <th>ข้อผูกพัน</th>
          </tr>
        </thead>
        <tbody>
        @for ($i = 0 ; $i < $rbac_data['total'] ;$i++)
          <tr>
            <td class="col-md-2">
            	@if(isset($rbac_data['rbac_role']['data'][$i]->role_name))
            		{{ $rbac_data['rbac_role']['data'][$i]->role_name }}
            	@else
            		{{ "" }}
            	@endif
            </td>
            <td class="col-md-2">
            	@if(isset($rbac_data['rbac_data']['data'][$i]->data_name))
            		{{ $rbac_data['rbac_data']['data'][$i]->data_name }}
            	@else
            		{{ "" }}
            	@endif
            </td>
            <td class="col-md-2">
            	@if(isset($rbac_data['rbac_action']['data'][$i]->action_name))
            		{{ $rbac_data['rbac_action']['data'][$i]->action_name }}
            	@else
            		{{ "" }}
            	@endif
            </td>
            <td class="col-md-2">
            	@if(isset($rbac_data['rbac_purp']['data'][$i]->purp_name))
            		{{ $rbac_data['rbac_purp']['data'][$i]->purp_name }}
            	@else
            		{{ "" }}
            	@endif
            </td>
            <td class="col-md-2">
            	@if(isset($rbac_data['rbac_cond']['data'][$i]->cond_name))
            		{{ $rbac_data['rbac_cond']['data'][$i]->cond_name }}
            	@else
            		{{ "" }}
            	@endif
            </td>
            <td class="col-md-2">
            	@if(isset($rbac_data['rbac_obl']['data'][$i]->obl_name))
            		{{ $rbac_data['rbac_obl']['data'][$i]->obl_name }}
            	@else
            		{{ "" }}
            	@endif
            </td>
          </tr>
         @endfor
        </tbody>
      </table>
	</div>
	@endif
	<br />

	{{ Form::open([
      "route" =>array('policyrbac_save', $results['policy']->id),
      "autocomplete" => "off",
      "class"=>"form-horizontal"
    ])}}
	  <div class="form-group">
	    <label for="inputEmail1" class="col-lg-2 control-label">บทบาท</label>
	    <div class="col-lg-6">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_role[]">

			    @foreach ($results['role'] as $role)
			    	<option value="{{ $role->id }}">{{ $role->role_name }}</option>
			    @endforeach
			  
			  </select>
			  <a  href="{{ URL::to('role-add' ) }}" class="btn btn-success">เพิ่มชื่อบทบาท</a>
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">ข้อมูล</label>
	    <div class="col-lg-8">
	      		
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_data[]">
			    @foreach ($results['data'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->data_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('data-add' ) }}" class="btn btn-success">เพิ่มข้อข้อมูล</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">การกระทำ</label>
	    <div class="col-lg-6">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_action[]">
			    @foreach ($results['action'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->action_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('action-add' ) }}" class="btn btn-success">เพิ่มชื่อการกระทำ</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">วัตถุประสงค์</label>
	    <div class="col-lg-6">
	      
			<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_purpose[]">
			    @foreach ($results['purpose'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->purp_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('purpose-add' ) }}" class="btn btn-success">เพิ่มชื่อวัตถุประสงค์</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">เงื่อนไข</label>
	    <div class="col-lg-6">
	      	
	      	<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_condition[]">
			    @foreach ($results['condition'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->cond_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('condition-add' ) }}" class="btn btn-success">เพิ่มชื่อเงื่อนไข</a>		
			</div>

	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword1" class="col-lg-2 control-label">ข้อผู้กพัน</label>
	    <div class="col-lg-6">
	      	
	      	<div class="input-group btn-group">
			  <span class="input-group-addon"><b class="glyphicon glyphicon-list-alt"></b></span>
			  <select class="multiselect" multiple="multiple" name="rbac_obligation[]">
			    @foreach ($results['obligation'] as $data)
			    	<option value="{{ $data->id }}">{{ $data->obl_name }}</option>
			    @endforeach
			  </select>
			  <a  href="{{ URL::to('obligation-add' ) }}" class="btn btn-success">เพิ่มชื่อข้อผูกพัน</a>		
			</div>
			
	    </div>
	  </div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary save-policy" >บันทึก</button>
	</div>
{{ Form::close() }}
</div>
@stop