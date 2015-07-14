<div >

	<form class="form-horizontal" role="form">
	<div class="form-group">
        <label for="inputPassword1" class="col-lg-4 control-label">ชื่อจริง</label>
        <div class="col-lg-4">
          <div >
              		{{ $rs->fname }}
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword1" class="col-lg-4 control-label">นามสกุล</label>
        <div class="col-lg-4">
          <div >
              		{{ $rs->lastname }}
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword1" class="col-lg-4 control-label">ตำแหน่ง</label>
        <div class="col-lg-4">
          <div >
                  {{ $rs->position }}
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword1" class="col-lg-4 control-label">อีเมล์</label>
        <div class="col-lg-4">
          <div >
              		{{ $rs->email }}
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword1" class="col-lg-4 control-label">เบอร์ติดต่อ</label>
        <div class="col-lg-4">
          <div >
              		{{ $rs->tel}}
          </div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword1" class="col-lg-4 control-label">ประเภทความรับผิดชอบ</label>
        <div class="col-lg-4">
          <div >
                    {{ PolicyDutyType::find($rs->duty_type)->name}}
          </div>
        </div>
    </div>
</form>
		
 </div><!--/col-lg-12-->