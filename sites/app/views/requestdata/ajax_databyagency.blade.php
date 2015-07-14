@if(count($all_data) > 0)
    <select class="form-control" name="querydata-list" id="querydata-list">
        @foreach ($all_data as $key => $val)
            <option value="{{$val->data_id}}">{{$val->data_name}}</option>
        @endforeach
    </select>
@else
    <select class="form-control" name="querydata-list" id="querydata-list">
        <option value="">-- ไม่พบข้อมูล --</option>
</select>
@endif