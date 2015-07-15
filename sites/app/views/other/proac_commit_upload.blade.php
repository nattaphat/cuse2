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
            <!-- Table -->
            <table id="result_search_policy"  class="table table-hover table-bordered">
                <thead>
                <tr class="active">
                    {{--<th class="text-center">ลำดับ</th>--}}
                    <th class="text-center">รายการ</th>

                </tr>
                </thead>
                <tbody>
                <tr >
                    {{--<td class="col-md-1 text-center">--}}
                    {{--</td>--}}
                    <td class="col-md-5 text-left">
                        {{
                        Form::file(
                        $rs['eng_name'],
                        [
                        "multiple"=>"true",
                        "id"=>$rs['eng_name'],
                        "class"=>"commit_upload"
                        ]
                        );
                        }}
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div><!-- End All Privacy -->
    </div>


    </div><!--/col-lg-12-->
@stop
