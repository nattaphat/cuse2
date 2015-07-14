@extends('layouts.admin')

@section ('admincontent')

<ol class="breadcrumb">
  <li class="active">หน้าหลัก</li>
  <li class="active">อาร์บีเอซี</li>
  <li><a href="{{ URL::route('obligationshow') }}">ข้อผูกพัน</a></li>
  <li class="active">แก้ไขชื่อข้อผูกพัน</li>
</ol>
<ul class="errors">
  @foreach($errors->all('<li>:message</li>') as $message)
    {{ $message }}
  @endforeach
  </ul>
 <div class="col-lg-8">
  {{ Form::open([
  "url" => "obligation-edited/$obligation_result->id",
  "id"=>"form-obligation-editing",
  "autocomplete" => "off",
  "class"=>"form-horizontal"
])}}
    
  <div class="form-group">
      <label for="inputEmail1" class="col-lg-3 control-label">ชื่อข้อผูกพัน</label>
      <div class="col-lg-8">
        {{ Form::text("obligationname",$obligation_result->obl_name,[
        "id"=>"data-text",
        "placeholder" => "ชื่อข้อผูกพัน",
        "class"=>"form-control"
    ]) }}
      </div>
    </div>

<div class="modal-footer">
      <a href="{{ URL::to('obligation-del' ) }}/{{ $obligation_result->id }}" class="btn btn-danger btn-md del-role" onclick="return confirm('ท่านต้องการลบข้อผูกพันนี้ใช่หรือไม่ ?')">ลบทิ้ง</a>
      <button type="submit" class="btn btn-primary save-data" >บันทึกการเปลี่ยนแปลง</button>
</div>
{{ Form::close() }}
 </div><!--/col-lg-12-->

@stop