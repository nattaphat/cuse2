@extends('layouts.admin')


@section ('head')
  @parent
  <!-- CSS for Password Meter -->
  <link href="{{ Config::get('nhc/site.asset_url') }}pwdmeter/css/pwdmeter.css" rel="stylesheet">
  
  <!-- CSS for Password Generator -->
  <link href="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/css/base.css" rel="stylesheet">
  <link href="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/css/home.css" rel="stylesheet">
@stop

@section ('bodyjs')
  @parent
  <!-- JS for password meter $('svg').remove()-->
  <script src="{{ Config::get('nhc/site.asset_url') }}/pwdmeter/js/pwdmeter.js"></script>
@stop


@section ('admincontent')

<ol class="breadcrumb">
  <li><a href="{{URL::route('policy')}}">หน้าหลัก</a></li>
  <li class="active">ตั้งค่าความมั่นคง</li>
</ol>
 <div class="col-lg-12">
  <div class="bs-example bs-example-tabs">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-toggle="tab" id="tab_changepwd" href="#changepwd">เปลี่ยนรหัสผ่าน</a></li>
        <li><a data-toggle="tab" id="tab_pwdmeter" href="#pwdmeter">มาตรวัดรหัสผ่าน</a></li>
        <li><a data-toggle="tab" id="tab_pwdsuggest" href="#pwdsuggest">แนะนำการตั้งรหัสผ่าน</a></li>
        <li><a data-toggle="tab" href="#pwdgenerator">เครื่องมือสร้างรหัสผ่าน</a></li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div id="changepwd" class="tab-pane fade in active">
          <div class="panel panel-default ">
              <!-- Change Password panel contents -->
              <div class="panel-heading">แผงเปลี่ยนรหัสผ่าน</div>
              <div class="panel-body">
                <p></p>
              </div>
        
              {{ Form::open([
                "route" => array("usersecuritysave", $userinfo->user_id),
                "id"=>"form-accountsave",
                "autocomplete" => "off",
                "class"=>"form-horizontal"
              ])}}
                
              {{ Form::token() }}
              {{ Form::hidden("status", $userinfo->user_status) }}
              {{ Form::hidden("grp_id", $userinfo->grp_id) }}
              {{ Form::hidden("user_id", $userinfo->user_id) }}
              <ul class="errors">
                @foreach($errors->all('<li>:message</li>') as $message)
                  {{ $message }}
                @endforeach
                </ul>
              
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">*รหัสผ่านเดิม</label>
                    <div class="col-lg-4">
                      {{ Form::password("oldpassword", [
                            "id"=>"oldpassword",
                            "placeholder" => "●●●●●●●●●●",
                            "class"=>"form-control"
                        ]) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">*รหัสผ่านใหม่</label>
                    <div class="col-lg-4">
                      
                      {{ Form::password("password", [
                            "id"=>"password",
                            "placeholder" => "●●●●●●●●●●",
                            "class"=>"form-control"
                        ]) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">*ระบุรหัสผ่านอีกครั้ง</label>
                    <div class="col-lg-4">
                      {{ Form::password("password_confirmation", [
                            "id"=>"password_confirmation",
                            "placeholder" => "●●●●●●●●●●",
                            "class"=>"form-control"
                        ]) }}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                  </div>
                {{ Form::close() }}

            </div>
        </div> <!-- End Home Tap -->
        <div id="pwdmeter" class="tab-pane fade">
            <div class="panel panel-default ">
                <!-- Change Password panel contents -->
                <div class="panel-heading">แผงมาตรวัดรหัสผ่าน</div>
                <div class="panel-body">
                  <p></p>
                  <form id="formPassword" name="formPassword">
                    <table id="tablePwdCheck" cellpadding="5" cellspacing="1" border="0">
                        <tr>
                            <th colspan="2" class="txtCenter">ทดสอบรหัสผ่าน</th>
                            <th class="txtCenter">ความต้องการอย่างน้อย</th>
                        </tr>
                        <tr>
                        <th>รหัสผ่าน:</th>
                        <td>
                              <input 
                                type="text" 
                                id="passwordTxt" 
                                name="passwordTxt" 
                                autocomplete="off" 
                                class= "form-control"
                                onkeyup="chkPass(this.value);" />
                        </td>
                        <td rowspan="4">
                            <ul>
                                <li>ความยาวอย่างน้อย 8 ตัวอักษร</li>
                                <li>ควรประกอบไปด้วย:<br />
                                    - ตัวอักษาพิมพ์ใหญ่<br />
                                    - ตัวอักษรพิมพ์เล็ก<br />
                                    - ตัวเลข<br />
                                    - สัญลักษณ์<br />
                                </li>
                            </ul>
                        </td>
                      </tr>
                      <tr>
                          <th>คะแนน:</th>
                          <td>
                              <div id="scorebarBorder" >
                              <div id="score">0%</div>
                              <div id="scorebar">&nbsp;</div>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <th>ความซับซ้อน:</th>
                          <td><div id="complexity">สั้นไป</div></td>
                      </tr>
                      <tr></tr>
                  </table>
             </form>
*แหล่งที่มา : Jeff Todnem(2007) (http://www.todnem.com/)
                </div>
            </div>
        </div><!-- End pwdmeter -->

        <div id="pwdsuggest" class="tab-pane fade">
            <div class="panel panel-default ">
                <!-- Change Password panel contents -->
                <div class="panel-heading">แผงแนะนำการตั้งรหัสผ่าน</div>
                <div class="panel-body">
                  <p>ข้อแนะนำพื้นฐานในการกำหนดรหัสผ่านที่ปลอดภัย</p>
                </div>
                <table class="table table-hover">
                  <thead>
                    <tr class="active">
                      <th class="text-center">ลำดับ</th>
                      <th class="text-center">คำแนะนำ</th>
                    </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td class="text-center col-md-1">1</td>
                    <td>การกำหนดรหัสผ่านให้มีความยาวอย่างน้อย 8 อักษร </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">2</td>
                    <td>ควรมีอักษรตัวพิมเล็ก (Lowercase letters) เช่น a, b, c เป็นต้น </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">3</td>
                    <td>ควรมีอักษรตัวพิมเล็ก (Lowercase letters) เช่น a, b, c เป็นต้น </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">4</td>
                    <td>ควรมีอัอักษรตัวพิมใหญ่ (Uppercase letters) เช่น A, B, C เป็นต้น </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">5</td>
                    <td>ควรมีตัวเลข (Numbers) คือ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">6</td>
                    <td> ควรมีสัญลักษณ์ (Symbols) เช่น ( ) ` ~ ! @ # $ % ^ & * - + = | \ { } [ ] : ; " ' < > , . ? / เป็นต้น </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">7</td>
                    <td>ควรมีกษรแบบยูนิโค้ด (Unicode characters) คือ €, ?, ?, และ ? </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">8</td>
                    <td>รหัสผ่านไม่ควรที่ประกอบด้วยตัวอักษรที่มีอยู่ในชื่อ user name เกินกว่า 3 ตัวอักษร </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">9</td>
                    <td>เพื่อให้มีความปลอดภัยเพิ่มขึ้นควรทำเปลี่ยนรหัสผ่านเป็นประจำอย่างน้อยทุกๆ 42 วัน </td>
                  </tr>
                  <tr>
                    <td class="text-center col-md-1">10</td>
                    <td>ไม่ควรใช้รหัสผ่านซ้ำกับรหัสผ่านที่เคยใช้มาแล้ว </td>
                  </tr>
                  <tr>
                    <td class="text-center">11</td>
                    <td>อย่าเขียนรหัสผ่านลงกระดาษโดยเด็ดขาด</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div> <!-- End pwdsuggest -->

        <div id="pwdgenerator" class="tab-pane fade">
            <div class="panel panel-default ">
                <!-- Change Password panel contents -->
                <div class="panel-heading">แผงเครื่องมือสร้างรหัสผ่าน</div>
                <div class="col-md-12 padding-top text-right">
                    <!-- Button trigger modal -->
                  <a href="#" class="btn btn-success btn-sm" onclick = "$('svg').remove();">ยกเลิก</a>
              </div>
                <div class="panel-body">
  
                  <div class="container-fluid">
                      <div class="row-fluid">
                        <div class="span12 background-span">
                          <div class="row-fluid">
                            <div class="span3 alert">
                              <div class="span1">
                                <h3 class="alert-label">1</h3>
                              </div>
                              <div class="span6">
                                <div class="row-fluid">
                                  <div class="span12">
                                    <h6>ระบุสองคำเพื่อสุ่ม</h6>
                                  </div>
                                </div>
                                <div class="row-fluid">
                                  <div class="span12">-</div>
                                </div>
                                <div class="row-fluid">
                                  <div class="span5">
                                    <input type="text" class="span12" id="word_1" x-webkit-speech="" value="">
                                  </div>
                                  <div class="span5">
                                    <input type="text" class="span12" id="word_2" x-webkit-speech="" value="">
                                  </div>
                                  
                                </div>
                                <div class="row-fluid">
                                  <div class="span6">
                                    <button id="switchWordsButton" class="btn btn-primary">
                                      <i class="icon-align-left icon-white"></i> สลับ
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="span8 phrase-container vert-center" id="original-phrase" style="margin-top: 50px;"></div>
                          </div>
                        </div>
                      </div>

                      <div class="row-fluid" id="substitution-row">
                        <div class="span12 background-span">
                          <div class="row-fluid">
                            <div class="span5 alert">
                              <div class="span1">
                                <h3 class="alert-label">2</h3>
                              </div>
                              <div class="span11">
                                <div class="row-fluid">
                                  <div class="span12">
                                    <h6>Decorate some letters</h6>
                                  </div>
                                </div>
                                <div class="row-fluid">
                                  <div class="span12">
                                    -
                                  </div>
                                </div>
                                <div class="row-fluid control-group">
                                  <div class="span10">
                                    <div id="securityLevelButtonGroup" style="width: 170px;">
                                      <a class="svg-link enabled" href="javascript:void(0)" data-strength="0" title="Click to decorate some" style="width: 50px; height: 30px; float: left; display: block; overflow: hidden;">
                                        <svg height="30" version="1.1" width="170" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.90625px;">
                                          <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc>
                                          <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                          <path fill="#fcf8e3" stroke="#000000" d="M0,30L170,0L0,0Z" stroke-width="0" transform="matrix(1,0,0,1,0,0)" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            
                                          </path>
                                        </svg>
                                      </a>
                                      <a class="svg-link" href="javascript:void(0)" data-strength="1" title="Click to decorate more" style="width: 50px; height: 30px; float: left; display: block; overflow: hidden; margin-left: 10px;">
                                        <svg height="30" version="1.1" width="170" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.90625px;">
                                          <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc>
                                          <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                          <path fill="#fcf8e3" stroke="#000000" d="M0,30L170,0L0,0Z" stroke-width="0" transform="matrix(1,0,0,1,-60,0)" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                        </svg>
                                      </a>
                                      <a class="svg-link" href="javascript:void(0)" data-strength="2" title="Click to decorate most" style="width: 50px; height: 30px; float: left; display: block; overflow: hidden; margin-left: 10px;">
                                        <svg height="30" version="1.1" width="170" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.90625px;">
                                          <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc>
                                          <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                          <path fill="#fcf8e3" stroke="#000000" d="M0,30L170,0L0,0Z" stroke-width="0" transform="matrix(1,0,0,1,-120,0)" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                        </svg>
                                      </a>
                                    </div>
                                  </div>
                                  
                                </div>
                                <div class="row-fluid">
                                  <div class="span12">
                                    <button id="redoTransformButton" class="btn btn-primary">
                                      <i class="icon-refresh icon-white"></i> Decorate Letters Again
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="span7 vert-center" id="phrase-substitutions" style="margin-top: 10px;">
                              <div>
                                <div id="rememberStrings">
                                  
                                </div>
                                <div class="phrase-container">
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row-fluid">
                        <div class="span12 background-span">
                          <div class="row-fluid">
                            <div class="span5 alert">
                              <div class="span1">
                                <h3 class="alert-label">3</h3>
                              </div>
                              <div class="span11">
                                <div class="row-fluid">
                                  <div class="span12">
                                    <h6>ใช้รหัสผ่านที่แข็งแกร่ง</h6>
                                  </div>
                                </div>
                                <div class="row-fluid">
                                  <div class="span12">
                                    -
                                  </div>
                                </div>
                                <div class="row-fluid">
                                  <div class="span6">
                                    <input type="text" class="span12" readonly id="phrase" x-webkit-speech="" value="">
                                  </div>
                                  <div class="span6">
                                    <a href="https://www.google.com/accounts/PasswordHelp?hl=en" target="_blank">
                                      Strength:
                                    </a>
                                    <span id="strength-desc">Strong</span>
                                    <div id="strengthMeter" class="progress" style="">
                                      <div id="strength1" class="bar" style="width: 25%;"></div>
                                      <div id="strength2" class="bar" style="width: 25%;"></div>
                                      <div id="strength3" class="bar" style="width: 25%;"></div>
                                      <div id="strength4" class="bar" style="width: 25%;"></div>
                                    </div>
                                  </div>
                                </div>
                                <div style="position:relative">
                                  <div class="zclip" id="zclip-ZeroClipboardMovie_1" 
                                    style="position: absolute; left: 0px; top: 0px; width: 129px; height: 28px; z-index: 99;">
                                    <embed id="ZeroClipboardMovie_1" 
                                    src="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/js/ZeroClipboard.swf" 
                                    loop="false" menu="false" 
                                    quality="best" bgcolor="#ffffff" 
                                    width="129" height="28" name="ZeroClipboardMovie_1" 
                                    align="middle" allowscriptaccess="always" 
                                    allowfullscreen="false" type="application/x-shockwave-flash" 
                                    pluginspage="http://www.macromedia.com/go/getflashplayer" 
                                    flashvars="id=1&amp;width=129&amp;height=28" 
                                    wmode="transparent">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="span7 phrase-container vert-center" id="final-phrase" style="margin-top: 52px;"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  แหล่งที่มา:<br />
Bootstrap.js
* Copyright 2012 Twitter, Inc.
* http://www.apache.org/licenses/LICENSE-2.0.txt
<br />
jQuery v1.7.2 jquery.com
<br />
Raphaël 2.1.0 - JavaScript Vector Library  
<br />
SWFObject v2.2 <http://code.google.com/p/swfobject/>

                  <div id="measurements" class="offscreen">
                    <div class="block-char block-char-size-extra-large" id="block-char-size-extra-large">W</div>
                    <div class="block-char block-char-size-large" id="block-char-size-large">W</div>
                    <div class="block-char block-char-size-medium" id="block-char-size-medium">W</div>
                    <div class="block-char block-char-size-small" id="block-char-size-small">W</div>
                    <div class="block-char block-char-size-extra-small" id="block-char-size-extra-small">W</div>
                  </div>

                </div>
              </div>
              <!-- <script type="text/javascript" src="{{ asset('bundles/nhc/vendor/pwdgenerate/js/jquery.min.js') }}"></script>
              <script src="{{ asset('bundles/nhc/vendor/pwdgenerate/js/bootstrap.min.js') }}"></script> -->

              <script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/js/raphael-min.js"></script>
              <script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/js/sprintf-0.7-beta1.js"></script>
              <script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/js/swfobject.js"></script>
              <script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/js/jquery.zclip.min.js"></script>
              <script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/js/jquery.ba-hashchange.min.js"></script>
              <script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}pwdgenerate/js/passphrase-compiled.js"></script>
              <script type="text/javascript">

              /*
              ** PASSPHRASE
              */
              var pair_fetch_url = "https://www.passwordsavvy.org/wordpairs",
                getWords = PASSPHRASE.getWords,
                applyCharTransforms = PASSPHRASE.applyCharTransforms,
                switchWords = PASSPHRASE.switchWords,
                getWord_1 = PASSPHRASE.getWord_1,
                getWord_2 = PASSPHRASE.getWord_2,
                getPassphrase_1 = PASSPHRASE.getPassphrase_1,
                getPp_len = PASSPHRASE.getPp_len,
                setLetters = PASSPHRASE.setLetters,
                setNumbers = PASSPHRASE.setNumbers,
                setSymbols = PASSPHRASE.setSymbols,
                setWord_1 = PASSPHRASE.setWord_1,
                setWord_2 = PASSPHRASE.setWord_2,
                getLetters = PASSPHRASE.getLetters,
                getNumbers = PASSPHRASE.getNumbers,
                getSymbols = PASSPHRASE.getSymbols,
                getSubstitutions = PASSPHRASE.getSubstitutions;


              /*
              ** Initialization
              */
              $(document).ready(function () {
                // Set initial state
                updateSecurityLevel(0, true);

                // The rendered arrows need to re-layout manually
                $(window).resize(function (e) {
                  relayoutPhrases();
                });

                // Fetch the initial set of words
                getWords(pair_fetch_url).done(function () {
                  applyCharTransforms();
                  displayWords();
                });

                // Handle page changes
                $(window).hashchange(handleHashChange);
                $(window).hashchange();

                // Hookup controls
                $('#word_1').change(function(e) {
                  wordEdited(e.target.value, 1);
                });
                $('#word_2').change(function(e) {
                  wordEdited(e.target.value, 2);
                });
                $("#refreshWordsButton").click(function(e) {
                  getNewWords();
                });
                $("#switchWordsButton").click(function(e) {
                  swapWords();
                });
                $("#redoTransformButton").click(function(e) {
                  redoTransform();
                });

                if (swfobject.hasFlashPlayerVersion("1")) {
                  $('#copyButton').zclip({
                    path: './js/ZeroClipboard.swf',
                    copy: function() { return $('#phrase').val(); },
                    afterCopy: function() {}
                  });
                } else {
                  $('#copyButton').hide();
                }

                renderStrengthButtons();
              });

              function renderStrengthButtons() {
                // constants
                var strengthSectionWidth = 50;
                var strengthMaxHeight = 30;
                var strengthIntraSpace = 10;

                // get elements to change
                var $buttonsParent = $("#securityLevelButtonGroup");
                var $buttons = $buttonsParent.children();

                // calc the path of the entire strength display
                var strengthWidth = strengthSectionWidth * $buttons.length + strengthIntraSpace * ($buttons.length - 1);
                var strengthMeterPath = "M0," + strengthMaxHeight +   // bottom-left
                            "L" + strengthWidth + ",0" +  // to top-right
                            "L0,0" +            // to top-left
                            "Z";              // close
                $buttons.each(function(i, button) {
                  // add the entire display to the button
                  var $button = $(button);
                  var paper = Raphael(button, strengthWidth, strengthMaxHeight);
                  var path = paper.path(strengthMeterPath);
                  path.attr("stroke-width", 0);
                  path.attr("fill", $button.css('color'));

                  // offset the triangle so this button only shows its portion
                  path.translate(-i * (strengthSectionWidth + strengthIntraSpace));

                  // make sure the button is sized correctly
                  $button.css({
                    width: strengthSectionWidth,
                    height: strengthMaxHeight,
                    float: "left",
                    display: "block",
                    overflow: "hidden"
                  });

                  // add the intra-button spacing if necessary
                  if (i > 0) {
                    $button.css("margin-left", strengthIntraSpace);
                  }

                  // handle the click event
                  $button.click(function(e) {
                    updateSecurityLevel(e.target);
                  });
                });

                // adjust the overall width of the parent of the buttons so they never wrap
                $buttonsParent.css('width', strengthWidth);
              }

              /*
              ** Page handling
              */
              function handleHashChange() {
                // Get the current page name
                var pageName = window.location.hash;
                if (pageName[0] === "#") {
                  pageName = pageName.slice(1);
                }
                if (!pageName) {
                  pageName = "home";
                }

                // Find the page in the DOM
                var $page = $('#page-' + pageName + '.page');
                if ($page.length) {

                  // Remove remnants of previous pages
                  clearArrows();

                  // Make the new page active
                  $('.page-active').removeClass('page-active');
                  $page.addClass('page-active');

                  // Load the HTML for the page if not already loaded
                  var pageLoadPromise = $.Deferred();
                  if ($page.html() === "") {
                    pageLoadPromise = $.get('/pages/' + pageName);
                    pageLoadPromise.done(function(html) {
                      $page.html(html);
                      onPageLoaded($page, pageName)
                    });
                  } else {
                    pageLoadPromise.resolve();
                  }

                  // When the page is loaded, make sure it's ready for the user
                  pageLoadPromise.done(function() {
                    onPageVisible($page, pageName);
                  });
                }
              }

              function onPageLoaded($page, pageName) {
                if (pageName === "contact-us") {
                  $page.find("form[name=send-form]").submit(validateEmailForm);
                } else if (pageName === "terms-of-use") {
                  addToSMailAddr();
                }
              }

              function onPageVisible($page, pageName) {
                if (pageName === "home") {
                  relayoutPhrases();
                } else if (pageName === "contact-us") {
                  $page.find("input, textarea").attr("value", "");
                  $page.find("input[name=name]").focus();
                }
              }


              /*
              ** Handlers for HTML controls
              */
              function updateSecurityLevel(valueOrElement, isInitialPopulate) {
                // Get the new setting
                var setting = 0;
                if ($.isNumeric(valueOrElement)) {
                  setting = valueOrElement;
                } else {
                  var $e = $(valueOrElement).closest('*[data-strength]');
                  setting = Number($e.data("strength"));
                }

                // Adjust for boundaries
                if (setting < 0) {
                  setting = 0;
                } else if (setting > 2) {
                  setting = 2;
                }

                // Apply the setting
                if (setting === 0) {      // Initial caps, period separator, no numbers
                  setLetters(2);
                  setNumbers(1);
                  setSymbols(1);
                } else if (setting === 1) {   // Initial caps, basic symbol separator, one number
                  setLetters(2);
                  setNumbers(2);
                  setSymbols(1);
                } else {            // Extended symbol separator, one number, a random cap
                  setLetters(2);
                  setNumbers(2);
                  setSymbols(2);
                }

                // Reflect the setting in the UI
                var enabledClass = "enabled";
                $("#securityLevelButtonGroup > *").removeClass(enabledClass);
                $("#securityLevelButtonGroup > *[data-strength=" + setting + "]").addClass(enabledClass);

                // Update the word
                if (!isInitialPopulate) {
                  applyCharTransforms();
                  displayWords();
                }

                return false;
              }

              function getNewWords() {
                getWords(pair_fetch_url).done(function () {
                  applyCharTransforms();
                  displayWords();
                });

                return false;
              }

              function swapWords() {
                switchWords();
                applyCharTransforms();
                displayWords();

                return false;
              }

              function redoTransform() {
                applyCharTransforms();
                displayWords();
              }

              function wordEdited(newWord, wordIndex) {
                if (wordIndex == 1) {
                  setWord_1(newWord);
                } else if (wordIndex == 2) {
                  setWord_2(newWord);
                }

                applyCharTransforms();
                displayWords();

                return false;
              }


              /*
              ** PASSPHRASE to HTML
              */
              var arrowPapers = [];   // the Raphael papers for each arrow displayed
              function renderArrows(substitutions, $phraseStart, $phraseEnd, horizArrowPositions) {
                // Style for the arrows
                // We should consider moving this to the style sheet but we'll need to
                // consider a VML render in the case of most versions of IE
                var arrowBoundHalfWidth = 20,
                  arrowStrokeWidth = 1,
                  strokeColor = "#ccc",
                  strokeArrowEnd = "classic-medium-medium",
                  strokeVerticalMargin = 0,
                  $blockCharsStart = $phraseStart.find('.block-char'),
                  $blockCharsEnd = $phraseEnd.find('.block-char'),
                  i = 0;

                // Basic arrow rendering function
                function renderArrow(x, y1, y2) {
                  // Quick check that we have something renderable
                  if (y2 - y1 <= 0) {
                    return;
                  }
                  var arrowPaper = Raphael(x - arrowBoundHalfWidth, y1, arrowBoundHalfWidth * 2, y2 - y1),
                    path = "M" + arrowBoundHalfWidth + "," + strokeVerticalMargin +
                        "L" + arrowBoundHalfWidth + "," + (y2 - y1 - strokeVerticalMargin),
                    arrow = arrowPaper.path(path);

                  arrow.attr('stroke-width', arrowStrokeWidth);
                  arrow.attr('stroke', strokeColor);

                  arrowPapers.push(arrowPaper);
                }

                // Walk through every character
                for (i = 0; i < substitutions.length; i = i + 1) {
                  // Get a bunch of information about the display of the character
                  var index = substitutions[i],
                    $blockCharStart = $($blockCharsStart[index]),
                    $blockCharEnd = $($blockCharsEnd[index]),
                    blockCharStartOffset = $blockCharStart.offset(),
                    blockCharEndOffset = $blockCharEnd.offset();

                    // Calculate the extents of the arrow
                    x = horizArrowPositions[index];
                    y1 = Math.round(blockCharStartOffset.top + $blockCharStart.outerHeight()),
                    y2 = Math.round(blockCharEndOffset.top);

                  // Render the arrow
                  renderArrow(x, y1, y2);
                }
              }

              function clearArrows() {
                for (var i = 0; i < arrowPapers.length; i++) {
                  // arrowPapers[i].clear();
                  $(arrowPapers[i].canvas).detach();
                }
                arrowPapers = [];
              }

              function renderArrowsForPhrases(horizArrowPositions) {
                clearArrows();

                var substitutions = getSubstitutions();
                renderArrows(substitutions, $('#original-phrase'), $('#phrase-substitutions .phrase-container'), horizArrowPositions);
                renderArrows(substitutions, $('#phrase-substitutions .phrase-container'), $('#final-phrase'), horizArrowPositions);
              }

              function calcHorizArrowPositions($blockChars) {
                var positions = {};

                // Walk through every character
                var substitutions = getSubstitutions();
                for (i = 0; i < substitutions.length; i = i + 1) {
                  // Get a bunch of information about the display of the character
                  var index = substitutions[i],
                    $blockChar = $($blockChars[index]),
                    blockCharOffset = $blockChar.offset(),
                    blockCharWidth = $blockChar.outerWidth(),

                    // Calculate the extents of the arrow
                    x = Math.round(blockCharOffset.left + (blockCharWidth / 2));

                  positions[index] = x;
                }

                return positions;
              }

              function addRememberText(horizArrowPositions) {
                // Get the container of the remember strings and its dimensions
                var $rememberStrings = $("#rememberStrings"),
                  rememberStringsOffset = $rememberStrings.offset(),
                  rememberStringsWidth = $rememberStrings.width();

                // Clear current strings
                $rememberStrings.html("");

                // For every substitution
                var substitutionDescriptions = [getSymbols(), getLetters(), getNumbers()];
                for (var i = 0; i < substitutionDescriptions.length; i++) {
                  var substitutionDescription = substitutionDescriptions[i],
                    phraseIndex = substitutionDescription.changed_pos;

                  // If we have a horizontal arrow
                  if (phraseIndex in horizArrowPositions) {
                    var text = sprintf(substitutionDescription.reminder, substitutionDescription);

                    // Render the text
                    if (text) {
                      // Create the element and add it to the DOM
                      // NOTE: there's a spacer div at the end to create a new-line
                      var $text = $("<div class='rememberString'><div class='pointer'></div><div class='content'></div></div><div></div>");
                      $text.find('.content').text(text);
                      $text.appendTo('#rememberStrings');

                      // Figure out the CSS, based on whether we need it to be
                      // right or left aligned
                      css = {
                        position: 'relative'
                      };
                      var leftPos = horizArrowPositions[phraseIndex] - rememberStringsOffset.left;
                      var outerContentWidth = $text.width();
                      if (leftPos + outerContentWidth > rememberStringsWidth) {
                        css['left'] = leftPos - outerContentWidth;
                        $text.addClass('remember-string-right-align');
                      } else {
                        css['left'] = leftPos;
                        $text.removeClass('align-right');
                      }
                      $text.css(css);
                    }
                  }
                }
              }

              function displayWords () {

                // Function to get the HTML for a phrase
                // 'words' can be either a single word or array of words
                function setPhrase($parent, words, fnGetClassForCharIndex) {
                  // clear content
                  $parent.html("");

                  // Fix words for non-arrays
                  var isOurArray = false;
                  if (!$.isArray(words)) {
                    isOurArray = true;
                    words = [words];
                  }

                  // Walk through each word, adding the characters to $parent
                  for (var i = 0, overallIndex = 0; i < words.length; i++) {
                    if (i > 0) {
                      $("<div class='block-char block-char-spacer'>&nbsp;</div>").appendTo($parent);
                    }

                    var word = words[i];
                    // Walk through each character of the word
                    for (var j = 0; j < word.length; j++) {
                      var classes = ["block-char"];
                      if (fnGetClassForCharIndex) {
                        // Call back to get the classes to apply.
                        // If the user passed in a single word, pass-back a single word
                        if (isOurArray) {
                          classes = fnGetClassForCharIndex(words[0], overallIndex, classes);
                        } else {
                          classes = fnGetClassForCharIndex(words, overallIndex, classes);
                        }
                      }

                      // Add the element to the HTML
                      var $char = $("<div class='" + classes.join(" ") + "'></div>");
                      if (word[j] == " ") {
                        $char.text("&nbsp;");
                      } else {
                        $char.text(word[j]);
                      }
                      $char.appendTo($parent);
                      overallIndex++;
                    }
                  }
                }

                // Function to create html to show the substitutions
                function setSubstitutionsPhrase($parent, substitutions, passphrase_1) {
                  var substitutionsLeft = $.merge([], substitutions);

                  // Do the normal htmlForPhrase generation
                  return setPhrase($parent, passphrase_1, function(word, overallIndex, classes) {
                    // And for characters that are actual substitutions, add a class
                    if (substitutionsLeft.length > 0 &&
                        overallIndex === substitutionsLeft[0]) {
                      classes.push("xform");
                      substitutionsLeft.shift()
                    }
                    return classes;
                  });
                }

                // Get information from the PASSPHRASE about the current words
                var word_1 = getWord_1(),
                  word_2 = getWord_2(),
                  passphrase_1 = getPassphrase_1(),
                  pp_len = getPp_len(),
                  substitutions = getSubstitutions();

                // Generate HTML for the original phrase
                setPhrase($('#original-phrase'), [word_1, word_2]);

                // Generate HTML for the substitutions
                setSubstitutionsPhrase($('#phrase-substitutions .phrase-container'), substitutions, passphrase_1);

                // Generate HTML for the final phrase
                setPhrase($('#final-phrase'), passphrase_1);

                // Fill in words in fields
                $('#word_1').attr('value', word_1);
                $('#word_2').attr('value', word_2);
                $('#phrase').attr('value', passphrase_1);

                // Change the strength meter
                $.ajax({
                  url: "https://www.google.com/accounts/RatePassword",
                  crossDomain: true,
                  data: {
                    Passwd: passphrase_1
                  },
                  dataType: "jsonp"
                }).done(function(data) {
                  // Get strength, ensuring the value is within the known bounds (1-offset)
                  var strengthNames = ["Weak", "Fair", "Good", "Strong"];
                  var strength = parseInt(data.rating);
                  var strength = Math.min(Math.max(1, strength), strengthNames.length);

                  // Fill in strength meter
                  for (var i = 1; i <= strength; i++) {
                    $("#strengthMeter #strength" + i).css("width", "25%");
                  }

                  // Fill in strength description
                  $('#strength-desc').text(strengthNames[strength - 1]);
                }).fail(function() {
                  $("#strengthMeter .bar").css("width", "0%");
                });
                $("#strengthMeter .bar").css("width", "0");

                // Force a re-layout
                relayoutPhrases();

                return false;
              }


              /*
              ** Layout helpers
              */
              function relayoutPhrases() {
                // First adjust the font sizes to fit the horizontal space
                horizontalAdjustPhraseContainers();

                // Figure out where the arrows would go horizontally
                horizArrowPositions = calcHorizArrowPositions($('#phrase-substitutions .phrase-container .block-char'));

                // Add the "remember" text based on horizontal positions
                addRememberText(horizArrowPositions);

                // Vertical center all the phrases (inclusive of the remember text if available)
                verticalCenterContainers();

                // Draw the arrows
                renderArrowsForPhrases(horizArrowPositions);
              }

              // Vertically center a container to its siblings (assumes a float)
              function verticalCenterContainers() {
                // Take each container
                $('.vert-center').each(function(i, container) {
                  // Grab all its previous siblings
                  var $container = $(container);
                  var $prev = $container.prevAll();

                  // Figure out the max height
                  var maxHeight = 0;
                  for (var i = 0; i < $prev.length; i++) {
                    var currentHeight = $($prev[i]).height();
                    if (currentHeight > maxHeight) {
                      maxHeight = currentHeight;
                    }
                  }

                  // Vertically center the container to that height
                  var containerHeight = $container.height(),
                    marginTop = (maxHeight - containerHeight) / 2;
                  $container.css('margin-top', Math.max(0, marginTop));
                });
              }

              // Adjust the size of the phrase characters
              function horizontalAdjustPhraseContainers() {
                // Get our baseline measurements (we could/should cache this)
                var measurements = []
                $('#measurements').children().each(function(i, measurement) {
                  var $measurement = $(measurement);
                  measurements.push([$measurement.attr('id'), $measurement.outerWidth(true) + 1]);
                });

                // Grab the first phrase container
                var sizeClass = null;
                var $phraseContainer = $($('.phrase-container')[0]);

                // and it's characters
                var $blockChars = $phraseContainer.find('.block-char');

                // and see which measurement fits first
                var phraseContainerWidth = $phraseContainer.width();
                for (var i = 0; i < measurements.length; i++) {
                  if ($blockChars.length * measurements[i][1] < phraseContainerWidth) {
                    sizeClass = measurements[i][0];
                    break;
                  }
                }

                // if nothing fit, take the last one
                if (!sizeClass) {
                  sizeClass = measurements[measurements.length - 1][0];
                }

                // Remove all the previous size classes
                $.each(measurements, function(i, measurement) {
                  $('.phrase-container .' + measurement[0]).removeClass(measurement[0]);
                });

                // Add the new size
                $('.phrase-container .block-char').addClass(sizeClass);
              }

              </script>

                </div>
            </div>
        </div> <!-- End pwdgenerate -->
        
      </div>
    </div>

    
 </div><!--/col-lg-12-->

@stop
