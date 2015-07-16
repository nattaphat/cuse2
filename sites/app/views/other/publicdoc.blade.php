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
        <li class="active">เอกสารเผยแพร่คลังสารสนเทศกลาง</li>
    </ol>
    <div class="col-lg-12">

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">เอกสารเผยแพร่คลังสารสนเทศกลาง</div>
            <div class="panel-body">
                <p>

                </p>
            </div>
            <br />

            @foreach ($rs as $key => $val)
                    <ul>
                        <li>{{$key}}
                            <ul>
                    @foreach ($val as $key2 => $val2)
                            <?php $dw_path = '/proj'.explode("/proj",$val2->fullpath)[1]; ?>
                            <li><a href="{{$dw_path}}" target="_blank">{{$val2->description}}</a></li>

                    @endforeach
                            </ul>
                        </li>
                    </ul>
            @endforeach

        </div>

    </div><!-- End All Privacy -->
    </div>
</div><!--/col-lg-12-->
@stop