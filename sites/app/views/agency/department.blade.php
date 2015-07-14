<select id="department_id" name="department_id" class="form-control">
  <option value="">- เลือก -</option>
  <? foreach ($dep as $key => $value) {?>
    <option value="{{$value['department_id']}}">{{$value['full_th_name']}}</option>
  <?
  }
  ?>
</select>