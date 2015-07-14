<table id="result_search_policy" class="table table-hover">
    <thead>
      <tr>
        <th class="text-center">รหัส</th>
        <th class="text-center">เนื้อหา</th>
        <th class="text-center">ผู้สร้าง</th>
        <th class="text-center">ผู้รับผิดชอบนโยบาย</th>
        <th class="text-center">สถานะ</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    <tbody><?php $i = $paginator->getFrom(); ?>
      
      @if(count($paginator) >=1)
        @foreach ($paginator as $policy)
            <tr>
              <td class="text-center col-md-1">
                 {{ $i++ }}
              </td>
              <td class="col-md-5 ">
                {{ Form::textarea("policy-text", $policy->policy_content ,[
                    "id"=>"policy-text",
                    "readonly"=>true,
                    "placeholder" => "Poicy Content",
                    "rows"=>"10",
                    "cols"=>"2",
                    "class"=>"form-control"
                ]) }}
              </td>
              <td class="text-center col-md-1">{{ $policy->author }}</td>
              <input type="hidden" id="policyduty_userinfo" value="{{URL::to('/policyduty/userinfo/')}}/{{$policy->policy_duty}}">
              <td class="text-center col-md-1">
                <a data-toggle="modal" href="#myModal" id="{{$policy->policy_duty}}" class="dutylist">
                {{ $policy->fname }}
                </a>

              </td>
              <td class="text-center col-md-1">
                @if($policy->status == 1)
                  <font color="green">เปิดใช้งาน</front>
                @else
                  อยู่ระหว่างพิจารณา
                @endif
              </td>
              <td class="col-md-4 text-center">
                <a  href="{{ URL::to('policy-rbac' ) }}/{{ $policy->id }}" class="btn btn-primary btn-sm">พีอาร์บีเอซี</a>
              <a  href="{{ URL::to('policy-show' ) }}/{{ $policy->id }}" class="btn btn-info btn-sm">แก้ไข</a>
              <a href="{{ URL::to('pbdiapolicy' ) }}/{{ $policy->id }}" class="btn btn-success btn-sm">พีบีดีพีไอเอ</a>
              <a href="{{ URL::to('policy-del' ) }}/{{ $policy->id }}" class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการลบทิ้งนโยบายการใช้งานคลังฯ ใช่หรือไม่ ?')">ลบ</a>
              </td>
            </tr>
        @endforeach
      @else
        ไม่พบข้อมูล
      @endif
    </tbody>
  </table>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">ข้อมูลผู้รับผิดชอบนโยบาย</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  {{-- @include('slider') --}}