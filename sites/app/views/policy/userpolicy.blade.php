@extends('layouts.admin')

@section ('admincontent')

{{ App::setLocale('th'); }}

<ol class="breadcrumb">
  <li class="active"><a href="{{URL::route('admin')}}">หน้าหลัก</a></li>
  <li><a href="{{ URL::to('querydata') }}">เรียกดูข้อมูล</a></li>
  <li class="active">แปลงนโยบายตามหลักอาร์บีเอซี / นโยบายคลังฯ รหัส:{{ $results->id }}</li>
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
    	{{ Form::textarea("policy-text", $results->policy_content ,[
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
		<table class="table table-hover">
        <thead>
          <tr>
            <th>{{ trans('nhc.role'); }}</th>
            <th>ข้อมูล</th>
            <th>การกระทำ</th>
            <th>วัตถุประสงค์</th>
            <th>เงื่อนไข</th>
            <th>ข้อผูกพัน</th>
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
	
</div>
@stop