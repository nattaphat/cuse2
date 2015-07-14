@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">ไพรเวซีเริ่มต้น</li>
  <li class="active">แก้ไขไพรเวซีเริ่มต้น</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "url" => "privacy-edited/".$rs['id'],
  "id"=>"form-purpose-editing",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อภาษาไทย</label>
      <div class="col-lg-9">
        {{ Form::text("name_th" ,$rs['name_th'],[
        "id"=>"purpose_name",
        "placeholder" => "ชื่อภาษาไทย",
        "class"=>"form-control"
      ]) }}
      </div>
      <label for="inputEmail1" class="col-lg-3 control-label">ค่าเริ่มต้น*</label>
      <div class="col-lg-9">
        {{
          Form::select('init_val', array(false => 'ปิด', true => 'เปิด'), $rs['init_value']);
        }}
      </div>

    </div>

  <div class="modal-footer">
        <button type="submit" class="btn btn-primary save-data" >บันทึกการเปลี่ยนแปลง</button>
  </div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop