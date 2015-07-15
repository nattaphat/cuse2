@extends('layouts.admin')
@section ('admincontent')

    <!-- http://www.webtipblog.com/adding-scroll-top-button-website/ -->
    <div class="scroll-top-wrapper ">
    <span class="scroll-top-inner">
        <i class="icon-circle-arrow-up icon-5"></i>
    </span>
    </div>

    <ol class="breadcrumb">
        <li><a href="{{ URL::to('admin') }}">หน้าหลัก</a></li>
        <li class="active">อัพเอกสารเผยแพร่คลังสารสนเทศกลาง</li>
    </ol>
    <div class="col-lg-12">

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">อัพเอกสารเผยแพร่คลังสารสนเทศกลาง</div>
            <div class="panel-body">
                <p>
                    {{$rs['name']}}
                </p>
            </div>
            {{ Form::open([
              "route" => array("proac_commmitupload_save"),
              "id"=>"form-training-adding",
              "autocomplete" => "off",
              "class"=>"form-horizontal",
              "files"=>true
            ])}}
            <input type="hidden" id="file_id" name="file_id" value="{{$rs['eng_name']}}">
            <input type="hidden" id="type_id" name="type_id" value="{{$typeid}}">
            <!-- Table -->
            <table id="result_search_policy"  class="table table-hover table-bordered">
                <thead>
                <tr class="active">
                    <th class="text-center">รายละเอียดเอกสาร</th>
                    <th class="text-center">อัพโหลด</th>

                </tr>
                </thead>
                <tbody>
                <tr >
                    <td class="col-md-7 text-center">
                        <textarea name="doc_des" id="doc_des" class="form-control custom-control" rows="3" style="resize:none" placeholder="ระบุรายละเอียดเอกสาร"></textarea>
                    </td>
                    <td class="col-md-5 text-left">
                        {{
                        Form::file(
                        $rs['eng_name']."[]",
                        [
                            "multiple"=>"false",
                            "id"=>$rs['eng_name'],
                            "class"=>"commit_upload"
                        ]
                        );
                        }}
                    </td>
                </tr>

                </tbody>
            </table>
            {{ Form::close() }}

            <br />
            <!-- Document list -->
            @if (count($alldoc) > 0)
            <table id="result_search_policy"  class="table table-hover table-bordered">
                <thead>
                <tr class="active">
                    <th class="text-center">รายละเอียด</th>
                    <th class="text-center">ชื่อไฟล์</th>
                    <th class="text-center">อนุญาตให้ดาวน์โหลด</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($alldoc as $key => $val)
                <tr >
                    <td class="col-md-5 text-left">
                        {{$val->description}}
                    </td>
                    <td class="col-md-5 text-left">
                        {{basename($val->fullpath)}}
                    </td>
                    <td class="col-md-2 text-center">
                        <input type="hidden" id="docpath" name="docpath" value="{{$val->fullpath}}">
                        <input type="checkbox" id="doc_status" name="doc_status" @if($val->document_status) checked @endif>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <br />
            <a href="{{ URL::route('proac_commmitupload_edit') }}" class="btn btn-info docstatus_edit">
                บันทึก
            </a>
            @endif
        </div>

    </div><!-- End All Privacy -->
    </div>
</div><!--/col-lg-12-->
@stop
