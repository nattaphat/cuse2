 <!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Header and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a
        @if(Auth::getUser()->grp_id == 1) 
            href="{{URL::to('policy-content')}}" 
        @else
            href="{{URL::to('admin')}}" 
        @endif
        class="navbar-brand" 
        >NHC</a>
      </div>
    <!-- // Header and toggle get grouped for better mobile display -->

    <!-- Main Navigation Menu -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
                      
            @if(Auth::getUser()->grp_id != 1) <!-- For User and Admin -->
            
            <li class="active"><a href="{{ URL::to('admin') }}" title="บทบาท:{{ Usernhc::getRoleName()->role_name }}"><i class="icon-male"></i> บทบาท: ( {{ Usernhc::getRoleName()->role_name }} ) </a></li>   
            @endif
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="icon-fixed-width icon-search"></i> ค้นหา<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li {{ (Request::is('peer_role') ? 'class="active"' : '') }}><a href="{{ route('peer_role') }}" title="ค้นหาตามบทบาท"><i class="icon-male"></i> ค้นหาตามบทบาท</a></li>
                        <li {{ (Request::is('peer_data') ? 'class="active"' : '') }}><a href="{{ route('peer_data') }}" title="ค้นหาตามชื่อข้อมูล"><i class="icon-hdd"></i> ค้นหาตามชื่อข้อมูล</a></li>
                        <li {{ (Request::is('peer_agency') ? 'class="active"' : '') }}><a href="{{ route('peer_agency') }}" title="ค้นหาตามชื่อหน่วยงาน"><i class="icon-building"></i> ค้นหาตามชื่อหน่วยงาน</a></li>
                       
                    </ul>

            </li>
            @if(Auth::getUser()->grp_id != 1) <!-- For User and Admin -->
            <li {{ (Request::is('querydata') ? 'class="active"' : '') }}><a href="{{ URL::to('/querydata') }}" title="ข้อมูล"><i class="icon-hdd"></i> ข้อมูล</a></li> 

            <li {{ (Request::is('reqdata') ? 'class="active"' : '') }}><a href="{{ URL::to('/reqdata') }}" title="ขอข้อมูล"><i class="icon-refresh"></i> ร้องขอข้อมูล</a></li>   
            
            <ul class="nav navbar-nav">
                    <li {{ (Request::is('/training/user/list') ? 'class="active"' : '') }}><a href="{{ URL::to('/training/user/list') }}" title="Training">
                        @if(Training::numTrainCourse() > 0)
                            <span class="badge pull-right">
                            {{ Training::numTrainCourse() }}
                            </span>
                        @endif
                    <i class="icon-calendar"></i> หลักสูตรอบรม</a></li>

                    <li {{ (Request::is('/reqdata/resultlist') ? 'class="active"' : '') }}><a href="{{ URL::to('/reqdata/resultlist') }}" title="Result request data">
                        @if(UsernhcController::getRequestDataInfo()['approve']['count'] > 0)
                            <span class="badge pull-right">
                            {{ UsernhcController::getRequestDataInfo()['approve']['count'] }}
                            </span>
                        @endif
                    <i class="icon-comment"></i> ผลการร้องขอข้อมูล</a></li>

                    <li {{ (Request::is('/reqdata/reqlist') ? 'class="active"' : '') }}><a href="{{ URL::to('/reqdata/reqlist') }}" title="Request Data">
                        @if(UsernhcController::getRequestDataInfo()['req']['count'] >0)
                            <span class="badge pull-right">
                            {{ UsernhcController::getRequestDataInfo()['req']['count'] }}
                            </span>
                        @endif
                    <i class="icon-exchange"></i> คำร้องขอข้อมูล</a></li>
                </ul> 

            @endif

            @if(Auth::getUser()->grp_id == 1) <!-- For SuperAdmin-->

            <li {{ (Request::is('policy-content') ? 'class="active"' : '') }}><a href="{{ URL::to('/policy-content') }}" title="นโยบายคลังฯ"><i class="icon-book"></i> นโยบายคลังฯ</a></li> 


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="icon-fixed-width icon-male"></i> พีอาร์บีเอซี<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('role') }}"><i class="icon-fixed-width icon-group"></i> บทบาท</a></li>
                    <li><a href="{{ URL::to('data') }}"><i class="icon-fixed-width icon-pencil"></i> ข้อมูล</a></li>
                    <li><a href="{{ URL::to('action') }}"><i class="icon-fixed-width icon-tasks"></i> การกระทำ</a></li>
                    <li><a href="{{ URL::to('purpose') }}"><i class="icon-fixed-width icon-thumbs-up-alt"></i> วัตถุประสงค์</a></li>
                    <li><a href="{{ URL::to('condition') }}"><i class="icon-fixed-width icon-exchange"></i> เงื่อนไข </a></li>
                    <li><a href="{{ URL::to('obligation') }}"><i class="icon-fixed-width icon-random"></i> ข้อผูกพัน </a></li>
                    <!--                         <li><a href="{{ route('rolelist') }}"><i class="icon-fixed-width icon-male"></i> Role List</a></li>
                    <li><a href="{{ route('datalist') }}"><i class="icon-fixed-width icon-pencil"></i> Data List</a></li> -->
                </ul>
            </li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="icon-fixed-width icon-meh"></i> ผู้ใช้งานและหน่วยงาน<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('userlist') }}"><i class="icon-fixed-width icon-meh"></i> ผู้ใช้งานในระบบ</a></li>
                    <li><a href="{{ URL::to('/policyduty/list') }}"><i class="icon-fixed-width icon-book"></i> ผู้รับผิดชอบนโยบาย</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('agency') }}"><i class="icon-fixed-width icon-building"></i> หน่วยงาน</a></li>
                    <li><a href="{{ URL::to('agencydata') }}"><i class="icon-fixed-width icon-building"></i> หน่วยงานและข้อมูล</a></li>
                </ul>
            </li>

 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="icon-fixed-width icon-dashboard"></i> สถิติและรายงาน<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('usage') }}"><i class="icon-fixed-width icon-dashboard"></i> สถิติ</a></li>
                    <li><a href="{{ URL::to('report') }}"><i class="icon-fixed-width icon-pencil"></i> รายงาน</a></li>
                </ul>
            </li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="icon-fixed-width icon-calendar"></i> หลักสูตรอบรม<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('training') }}"><i class="icon-fixed-width icon-calendar"></i> หลักสูตรอบรม</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('training/man/report') }}"><i class="icon-fixed-width icon-male"></i> ออกรายงาน-รายคน</a></li>
                    <li><a href="{{ URL::to('training/role/report') }}"><i class="icon-fixed-width icon-user"></i> ออกรายงาน-ตามบทบาท</a></li>
                    <li><a href="{{ URL::to('training/date/report') }}"><i class="icon-fixed-width icon-time"></i> ออกรายงาน-ช่วงเวลา</a></li>
                    <li><a href="{{ URL::to('training/course/report') }}"><i class="icon-fixed-width icon-tag"></i> ออกรายงาน-ชื่อหลักสูตร</a></li>
                </ul>
            </li>

        @endif
        </ul>

        <!-- right -->
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                <!-- <ul class="nav navbar-nav">
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('/') }}" title="English"><i class="icon-flag"></i>En</a></li>
                    <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('/') }}" title="ภาษาไทย"><i class="icon-flag"></i>Th</a></li>
                </ul> -->
                <!--@if(Auth::getUser()->grp_id != 1) --> <!-- For SuperAdmin-->
<!--                 <ul class="nav navbar-nav">
                    <li {{ (Request::is('/training/user/list') ? 'class="active"' : '') }}><a href="{{ URL::to('/training/user/list') }}" title="Training">
                        @if(Training::numTrainCourse() > 0)
                            <span class="badge pull-right">
                            {{ Training::numTrainCourse() }}
                            </span>
                        @endif
                    <i class="icon-calendar"></i> หลักสูตรอบรม</a></li>

                    <li {{ (Request::is('/reqdata/resultlist') ? 'class="active"' : '') }}><a href="{{ URL::to('/reqdata/resultlist') }}" title="Result request data">
                        @if(UsernhcController::getRequestDataInfo()['approve']['count'] > 0)
                            <span class="badge pull-right">
                            {{ UsernhcController::getRequestDataInfo()['approve']['count'] }}
                            </span>
                        @endif
                    <i class="icon-comment"></i> ผลการร้องขอข้อมูล</a></li>

                    <li {{ (Request::is('/reqdata/reqlist') ? 'class="active"' : '') }}><a href="{{ URL::to('/reqdata/reqlist') }}" title="Request Data">
                        @if(UsernhcController::getRequestDataInfo()['req']['count'] >0)
                            <span class="badge pull-right">
                            {{ UsernhcController::getRequestDataInfo()['req']['count'] }}
                            </span>
                        @endif
                    <i class="icon-exchange"></i> คำร้องขอข้อมูล</a></li>
                </ul>  -->
                <!--@endif-->

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="icon-fixed-width icon-user"></i> {{ Auth::getUser()->username }} ( กลุ่ม: {{ Usernhc::getUserGroupName()->grp_name }} )การตั้งค่า<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('privacy') }}/{{ Auth::getUser()->id }}"><i class="icon-fixed-width icon-cogs"></i> ตั้งค่าไพรเวซี</a></li>
                        <li><a href="{{ URL::to('user/account/security') }}/{{ Auth::getUser()->id }}"><i class="icon-fixed-width icon-shield"></i> ตั้งค่าความมั่นคง</a></li>
                        <li><a href="{{ URL::to('user/account') }}/{{ Auth::getUser()->id }}"><i class="icon-fixed-width icon-pencil"></i> ข้อมูลบัญชี</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('pbdia') }}"><i class="icon-fixed-width icon-beaker"></i> พีบีดีพีไอเอ</a></li>
                        <li><a href="{{ URL::to('help') }}"><i class="icon-fixed-width icon-question"></i> การใช้งานระบบ</a></li>
                        <li><a href="{{ URL::to('functional') }}"><i class="icon-fixed-width icon-question"></i> ฟังก์ชันงานในระบบ</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('logout') }}"><i class="icon-fixed-width icon-signout"></i> ออกจากระบบ</a></li>
                    </ul>
                </li>
                <!-- side panel -->
                @if (Config::get('myadmin/site.use_side_panel') === true)
                    <li><a href="#" title="Sidebar" class="sidebar-trigger"><i class="icon-reorder"></i> Sidebar</a>
                </li>
                @endif
                <!-- // side panel -->
            @endif
        </ul>
        <!-- // right -->
    </div>
    <!-- // Main Navigation Menu -->
</div>
<!-- // navbar -->