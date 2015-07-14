@extends('layouts.admin')

@section ('admincontent')
 
<ol class="breadcrumb">
  <li><a href="{{ URL::route('policy') }}">หน้าหลัก</a></li>
  <li><a href="{{ URL::to('userlist') }}">รายการผู้ใช้งาน</a></li>
  <li class="active">ผู้ใช้งานในระบบ</li>
  <li class="active">พิจารณาผู้ใช้งาน</li>
</ol>
 <div class="col-lg-8">
  {{ Form::open([
  "route" => array("user_approval_save", $user_result->user_id),
  "id"=>"form-userapproval",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">ชื่อผู้ใช้งาน</label>
      <div class="col-lg-8">
        <h5>{{ $user_result->fname }}</h5>
      </div>
    </div>

  <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">นามสกุล</label>
      <div class="col-lg-8">
        <h5>{{ $user_result->lname }}</h5>
      </div>
    </div>

  <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">อีเมล์</label>
      <div class="col-lg-8">
        <h5>{{ $user_result->email }}</h5>
      </div>
    </div>
   
  <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">ประเภทผู้ใช้งาน</label>
      <div class="col-lg-4">

        <select class="form-control" name="user_grp">
          <option value="">-- เลือก --</option>
          @foreach ($usertype as $key => $val)
            <option value="{{ $val['grp_id'] }}"
            @if($user_result->grp_id == $val['grp_id'])
              selected="selected"
            @endif
            >
            {{ $val['text'] }}
          </option>
          @endforeach
        </select>

      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">หน่วยงานสังกัด</label>
      <div class="col-lg-8">
        <h5>{{ $user_result->agency_name }}</h5>
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">กระทรวง</label>
      <div class="col-lg-8">
        <h5>{{ $user_result->full_name }} ({{ $user_result->short_name }})</h5>
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">วันที่ลงทะเบียน</label>
      <div class="col-lg-8">
        <h5>{{ Carbon::createFromTimeStamp(strtotime($user_result->created_at))->format('Y-m-d'); }}</h5>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">สถานะผู้ใช้</label>
      <div class="col-lg-4">
        <select class="form-control" name="user_approve">
          <option value="">-- เลือก --</option>
          @foreach ($acive_status as $key => $val)
            <option value="{{ $val['status'] }}"
            @if($user_result->user_status == $val['status'])
              selected="selected"
            @endif
            >
            {{ $val['text'] }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

     <div class="form-group">
      <label for="inputPassword1" class="col-lg-4 control-label">บทบาท</label>
      <div class="col-lg-4">
        <select class="form-control" name="role_approve">
          <option value="">-- เลือก --</option>
          @foreach ($role_data as $key => $val)
            <option value="{{ $val->id}}"
              @if(isset($role_user->role_id ))
                  @if($role_user->role_id == $val->id)
                      selected
                  @endif
              @endif
              >
            {{ $val->role_name }}
          </option>
          @endforeach
        </select>
      </div>
    </div>


<div class="modal-footer">
      <a href="{{ URL::to('userlist-del' ) }}/{{ $user_result->user_id }}" class="btn btn-danger btn-md del-policy" onclick="return confirm('ท่านต้องการลบทิ้งผู้ใช้นี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
      <button type="submit" class="btn btn-primary save-policy" >บันทึกการเปลี่ยนแปลง</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop