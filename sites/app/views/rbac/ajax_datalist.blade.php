<!-- Table -->
  <table id="result_search_userlist" class="table table-hover">
    <thead>
      <tr >
        <th class="text-center">Id</th>
        <th class="text-center">Agency Name</th>
        <th class="text-center">Agency Status</th>
        <th class="text-center">Contact Person</th>
      </tr>
    </thead>
    <tbody>
      @if(count($result) > 0)
        
        @foreach ($result as $datainfo)  
            <tr>
              <td class="col-md-1">
                 {{ $datainfo->id}}
              </td>
              <td class="col-md-5 text-left">{{ $datainfo->agency_name }}</td>
              <td class="col-md-2 text-left">
                @if($datainfo->agency_status)
                  ส่งข้อมูลเข้าคลังข้อมูล
                @else
                  ตรวจสอบหน่วยงานข้อมูล
                @endif
              </td>
              <td class="col-md-3 text-left">
                  @if($datainfo->fname)
                    <a href="{{ URL::to('/userlist/approval')}}/{{$datainfo->user_id}}" >{{ $datainfo->fname }} </a>
                  @else
                    n/a
                  @endif
              </td>
            </tr>
        @endforeach
      @endif
    </tbody>
  </table>