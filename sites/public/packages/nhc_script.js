$(document).ready(function()
      {
        //Automatic close
        $(".alert-message").alert();
        window.setTimeout(function() { $(".alert-message").alert('close'); }, 2000);
        
        //Disable Enter key when do search 
        $(window).keydown(function(event){
          if(event.keyCode == 13) {
            event.preventDefault();
            return false;
          }
        });

        $('#result_search_result').dataTable();
        $('#result_search_userlist').dataTable();
        $('#policyduty_search').dataTable();
        $('#result_search_report').dataTable();
        $('#result_search_training').dataTable();
        $('#result_search_reqdata').dataTable();        
        $('#result_search_agency').dataTable();
        //$('#result_search_policy').dataTable();

        //getPrivacyInit();//Call list of init privacy

        // $('body').scrollspy({
        //     target: '.bs-docs-sidebar',
        //     offset: 40
        // });
        
        //Enable muliselect on policy to rbac page
        $('.multiselect').multiselect({
        buttonClass: 'btn',
        buttonWidth: 'auto',
        buttonContainer: '<div class="btn-group" />',
        maxHeight: false,
        buttonText: function(options) {
          if (options.length == 0) {
            return 'None selected <b class="caret"></b>';
          }
          else if (options.length > 3) {
            return options.length + ' selected  <b class="caret"></b>';
          }
          else {
            var selected = '';
            options.each(function() {
              selected += $(this).text() + ', ';
            });
            return selected.substr(0, selected.length -2) + ' <b class="caret"></b>';
          }
        }
      });

      //Reload Relate Policy
      $(".relate_policy").click(function(event){
          event.preventDefault();
          location.reload();
          //console.log('relate_policy');
      });


      $(".dutylist").click(function(event){
        var dutyID = $(this).data('id');
         event.preventDefault();
        var url = $('#policyduty_userinfo_'+dutyID).val();
        console.log(url);

        if (typeof url == "undefined"){
            // console.log('yesyes')
            url = $('#policyduty_userinfo').val();
        }
            

         $.ajax({
           type: 'GET',
           url: url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
            //console.log(data)
             $(".modal-body").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a
      
      //Function do search on policy-content page
        $(".policy-gosearch").click(function(event){
         event.preventDefault();
         if($('#policy-keyword').val() !='' ) {
           var keyword = $('#policy-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_policy").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a


        //Function do search on role
        $(".role-gosearch").click(function(event){
         event.preventDefault();
         if($('#role-keyword').val() !='' ) {
           var keyword = $('#role-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_role").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function do search on data
        $(".data-gosearch").click(function(event){
         event.preventDefault();
         if($('#data-keyword').val() !='' ) {
           var keyword = $('#data-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_data").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a


        //Function do search on action
        $(".action-gosearch").click(function(event){
         event.preventDefault();
         if($('#action-keyword').val() !='' ) {
           var keyword = $('#action-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_action").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function do search on purpose
        $(".purpose-gosearch").click(function(event){
         event.preventDefault();
         if($('#purpose-keyword').val() !='' ) {
           var keyword = $('#purpose-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_purpose").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function do search on condition
        $(".condition-gosearch").click(function(event){
         event.preventDefault();
         if($('#condition-keyword').val() !='' ) {
           var keyword = $('#condition-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_condition").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function do search on obligation
        $(".obligation-gosearch").click(function(event){
         event.preventDefault();
         if($('#obligation-keyword').val() !='' ) {
           var keyword = $('#obligation-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_obligation").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function do search on user
        $(".userlist-gosearch").click(function(event){
         event.preventDefault();
         if($('#userlist-keyword').val() !='' ) {
           var keyword = $('#userlist-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_userlist").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function do search on training
        $(".training-gosearch").click(function(event){
         event.preventDefault();
         if($('#training-keyword').val() !='' ) {
           var keyword = $('#training-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_training").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a


        //Function do search on request data list
        $(".reqdata-gosearch").click(function(event){
         event.preventDefault();
         //var req_type = $('#requestdata_type').val();
         if($('#reqdata-keyword').val() !='' ) {
           var keyword = $('#reqdata-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_reqdata").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function do search on result request data list
        $(".result-gosearch").click(function(event){
         event.preventDefault();
         //var req_type = $('#requestdata_type').val();
         if($('#result-keyword').val() !='' ) {
           var keyword = $('#result-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_result").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a


        //Function do search on result request data list
        $(".policyduty-gosearch").click(function(event){
         event.preventDefault();
         //var req_type = $('#requestdata_type').val();
         if($('#policyduty-keyword').val() !='' ) {
           var keyword = $('#policyduty-keyword').val();
         }else {
            var keyword = 'all' ;
         }
         var _url = $(this).attr('href')+'/'+keyword;
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#policyduty_search").empty().html(data);
              if(keyword =='all'){
                $("#pager").show(); 
              }else{
                $("#pager").hide(); 
              }
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a


        //Function ajax list role
        $(".rolelist").click(function(event){
         event.preventDefault();
         if($('#rbacrole-list').val() !='' ) {
           var type = $('#rbacrole-list').val();
         }
         var _url = $(this).attr('href')+'/'+type;
         //alert(_url)
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_rolelist").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function ajax list data
        $(".datalist").click(function(event){
         event.preventDefault();
         if($('#rbacdata-list').val() !='' ) {
           var type = $('#rbacdata-list').val();
         }
         var _url = $(this).attr('href')+'/'+type;
         //alert(_url)
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_datalist").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a


        //Function ajax list data
        $(".agencylist").click(function(event){
         event.preventDefault();
         if($('#rbacagency-list').val() !='' ) {
           var type = $('#rbacagency-list').val();
         }
         var _url = $(this).attr('href')+'/'+type;
         //alert(_url)
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_agencylist").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a


        //Function ajax list data
        $(".peerrole").click(function(event){
         event.preventDefault();
         if($('#peerrole-list').val() !='' ) {
           var role = $('#peerrole-list').val();
         }
         var _url = $(this).attr('href')+'/'+role;
         //alert(_url)
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_peerrole").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function ajax list data
        $(".peerdata").click(function(event){
         event.preventDefault();
         if($('#peerdata-list').val() !='' ) {
           var role = $('#peerdata-list').val();
         }
         var _url = $(this).attr('href')+'/'+role;
         //alert(_url)
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_peerdata").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //Function ajax list data
        // $(".querydata-list").change(function(event){
        //  event.preventDefault();
        //  var dataid = $('#querydata-list').val();
         
        //  console.log(dataid)
        //  // var _url = $(this).attr('href')+'/'+dataid+'/'+cond_id+'/'+flag+'/'+agencyid;
        //  // //console.log(_url);
         
        //  // $("#result_querydata").empty().html('<div align="center"><i class="icon-spinner icon-spin icon-large"></i><div>');
        //  // $.ajax({
        //  //   type: 'GET',
        //  //   url: _url,//"{{{ URL::to('content-policy' ) }}}",
        //  //   dataType: "html",
        //  //   success: function(data) {
        //  //     $("#result_querydata").empty().html(data);
        //  //   },
        //  //   error: function(XMLHttpRequest, textStatus, errorThrown) {
        //  //     alert('Error occured!, ' + XMLHttpRequest);
        //  //   }
        //  // });// end $.ajax
        // });//end .nav-list a


        //Function ajax list data
        $(".querydata").click(function(event){
         event.preventDefault();
         var dataid = $('#querydata-list').val();
         var agencyid = $('#allagency-list').val();
         var cond_id = $('#condition-list').val();
         var flag = ($('#flag_querydata').is(':checked')) ? 'yes' : 'no';
         var _url = $(this).attr('href')+'/'+dataid+'/'+cond_id+'/'+flag+'/'+agencyid;
         //console.log(_url);
         
         $("#result_querydata").empty().html('<div align="center"><i class="icon-spinner icon-spin icon-large"></i><div>');
         $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_querydata").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        // Data Query
        $('#flag_querydata').prop('checked',true);  //default checked for all agency
        $("#all_agency").hide(); // //default hide to select agehcy

        $("#flag_querydata").click(function(){
            $("#all_agency").toggle();
        });

        //Pagination ajax
        $(".reqdata").click(function(event)
          {
            event.preventDefault();
            var myurl = $(this).attr('href');
            var dataid = $('#querydata-list').val();
            var agencyid = $('#allagency-list').val();
            var condid = $('#condition-list').val();
            var req_type = $('#requestdata_type').val();
            //alert(myurl);
            $.ajax({
             type: 'post',
             url: myurl,//"{{{ URL::to('content-policy' ) }}}",
             data: ({dataid : dataid, agencyid : agencyid,condid:condid,req_type:req_type}),
             dataType: "html",
             success: function(rs) {
               $("#result_reqdata").empty().html(rs);
             },
             error: function(XMLHttpRequest, textStatus, errorThrown) {
               alert('Error occured!, ' + XMLHttpRequest);
             }
           });// end $.ajax
            // return false;
          });//end pangination


        $("#allagency-list").change(function(event)
          {
            
            event.preventDefault();
            var agencyid = $('#allagency-list').val();
            var url =  $('#req_databyagency_url').val();

           //  //alert(myurl);
            $.ajax({
             type: 'get',
             url: url+"/"+agencyid,
             dataType: "html",
             success: function(rs) {
               $("#req_databyagency").empty().html(rs);
             },
             error: function(XMLHttpRequest, textStatus, errorThrown) {
               alert('Error occured!, ' + XMLHttpRequest);
             }
           });// end $.ajax

            // return false;
          });//end pangination
        

        $('.datepicker').appendDtpicker({
          "autodateOnStart": false,
          "dateOnly": true,
          "calendarMouseScroll": false,
          "closeOnSelected": false
        });

        $('.sdt').appendDtpicker({
          "autodateOnStart": false,
          "dateOnly": false,
          "calendarMouseScroll": false,
          "closeOnSelected": false,
          "amPmInTimeList": false,
          "dateFormat": "YYYY-MM-DD hh:mm"
        });

        $('.edt').appendDtpicker({
          "autodateOnStart": false,
          "dateOnly": false,
          "calendarMouseScroll": false,
          "closeOnSelected": false,
          "amPmInTimeList": false,
          "dateFormat": "YYYY-MM-DD hh:mm"
        });

        $('.retainDate').appendDtpicker({
          "autodateOnStart": false,
          "dateOnly": true,
          "calendarMouseScroll": false,
          "closeOnSelected": true,
          "amPmInTimeList": false,
          "dateFormat": "YYYY-MM-DD"
        });

        //report search
        $(".report-gosearch").click(function(event){
         event.preventDefault();

          var datatype = $('#report_data_type').val();
          var sdt = $('#sdt').val();
          var edt = $('#edt').val();
          var _url = $(this).attr('href')+'/'+datatype+'/'+encodeURIComponent(sdt)+'/'+encodeURIComponent(edt);
          //console.log(sdt)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_report").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //report search
        $(".log_export").click(function(event){
         event.preventDefault();

          var datatype = $('#report_data_type').val();
          var sdt = $('#sdt').val();
          var edt = $('#edt').val();
          var _url = $(this).attr('href')+'/'+datatype+'/'+encodeURIComponent(sdt)+'/'+encodeURIComponent(edt);
          //console.log(sdt)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           headers: {
                Accept : "text/csv; charset=utf-8",
                "Content-Type": "text/csv; charset=utf-8",
                "Content-Type": "application/download"
                
            },
           //dataType: "json",
           success: function(data) {
             $("#result_search_report").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        
        //report search
        $(".retain-gosearch").click(function(event){
         event.preventDefault();

          var _url = $(this).attr('href');
          //console.log(sdt)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_search_retain").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a



        function getPrivacyInit()
        {
            var privacy_type = $('#privacyinit_type').val();
            var _url = $('#url_init_privacy').val()+'/'+privacy_type;

           $.ajax({
             type: 'get',
             url: _url,//"{{{ URL::to('content-policy' ) }}}",
             dataType: "html",
             success: function(data) {
               $("#result_search_initprivacy").empty().html(data);
             },
             error: function(XMLHttpRequest, textStatus, errorThrown) {
               alert('Error occured!, ' + XMLHttpRequest);
             }
           });// end $.ajax
        }

        $('#privacyinit_type').change(function(){
          getPrivacyInit();
        });


        //Export file PDF
        $(".export-pdf").click(function(event){
         event.preventDefault();
          var userid = $('#report_man').val();
          var _url = $(this).attr('href')+'/'+userid+'/yes/reportman';
          //console.log(_url)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        

        //report man search
        $(".reportman-gosearch").click(function(event){
         event.preventDefault();

          var userid = $('#report_man').val();
          var _url = $(this).attr('href')+'/'+userid;
          //console.log(_url)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_reportman_report").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

        //report role search
        $(".reportrole-gosearch").click(function(event){
         event.preventDefault();

          var roleid = $('#report_role').val();
          var _url = $(this).attr('href')+'/'+roleid;
          //console.log(_url)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_reportrole_report").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a
        
        //report date search
        $(".reportdate-gosearch").click(function(event){
         event.preventDefault();

          var sdt = $('#sdt').val();
          var edt = $('#edt').val();
          var _url = $(this).attr('href')+'/'+encodeURIComponent(sdt)+'/'+encodeURIComponent(edt);
          //console.log(sdt)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_reportdate_report").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a 


        //report date search
        $(".course-gosearch").click(function(event){
         event.preventDefault();

          var keyword = $('#course-keyword').val();
          if(keyword == ''){
            alert('กรุณาระบุคำที่ต้องการค้นหา')
            return false;
          }
          var _url = $(this).attr('href')+'/'+keyword;
          //console.log(sdt)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_reportcourse_report").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a 

        //report date search
        $("#ministry_id").change(function(event){
         event.preventDefault();

          var ministry_id = $('#ministry_id').val();
          var url = $('#url_getdepartment').val()
          var _url = url+'/'+ministry_id;
          //console.log(sdt)
         $.ajax({
           type: 'get',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#department_byministry_id").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a 

        //Function do search on data
        $(".agencydata-gosearch").click(function(event){
         event.preventDefault();
        var id = $('#agency_id').val();
        var _url = $(this).attr('href')+'/'+id;

        $.ajax({
           type: 'GET',
           url: _url,//"{{{ URL::to('content-policy' ) }}}",
           dataType: "html",
           success: function(data) {
             $("#result_agency_data").empty().html(data);
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert('Error occured!, ' + XMLHttpRequest);
           }
         });// end $.ajax
        });//end .nav-list a

      //Function do search on data
        $("#training_download").click(function(event){
         event.preventDefault();
        //var url = $('#traing_dwroute').val();
        var path_download = $(this).attr('href');
        //console.log(path_download)
            window.open(path_download,'_blank');
        });//end .nav-list a


        $("#training_upload").fileinput({
            "allowedFileExtensions":["pdf"],
            "maxFileSize":10240,//10MB
            "maxFileCount":5
        });


      $("#proactive_commitment,#proactive_secretdocument,#proactive_termsharing,#proactive_schedule_review_policy,#proactive_proj_technology_doc,#proactive_privacy_assessment_std,#proactive_report_compliance_policy,#proactive_privacy_security_audit,#privacyembeded_public_purpose,#privacyembeded_purpose_assessment,#privacyembeded_technology_design,#positivesum_thirdparty_term,#positivesum_index_purp,#end2end_riskassment,#usertransparency_privacy_adv,#usertransparency_data_accurency,#usertransparency_user_expected").fileinput({
          "allowedFileExtensions":["pdf","txt"],
          "maxFileSize":10240,//10MB
          "maxFileCount":1,
          //"allowedPreviewTypes":["html"]
          //"uploadUrl": "http://localhost/file-upload-single/1", // server upload action
          //"uploadAsync": true
      });


          function disableUpload(id_chk,id_upload){
              $("."+id_upload).addClass('disabled');
              $("#"+id_chk).click(function(){
                  if( $("#"+id_chk).is(':checked')){
                      $("."+id_upload).removeClass('disabled');
                  }else{
                      $("."+id_upload).addClass('disabled');
                  }
              });
          }

          //disableUpload("chkbx_proactive_commitment","cls_proactive_commitment");


          $(".docstatus_edit").click(function(event){
              event.preventDefault();
              var docpath = $('#docpath').val();
              var doc_status = $('#doc_status').val();
              var typeid = $('#type_id').val();
              var _url = $(this).attr('href');

              $.ajax({
                 type: 'POST',
                 url: _url,
                  data: (
                  {
                      docpath : docpath,
                      doc_status:doc_status,
                      typeid:typeid
                  }),
                 dataType: "html",
                 success: function(data) {
                     console.log(data)
                   //$("#result_agency_data").empty().html(data);
                 },
                 error: function(XMLHttpRequest, textStatus, errorThrown) {
                   alert('Error occured!, ' + XMLHttpRequest);
                 }
               });// end $.ajax
          });//end .nav-list a


        // $(".btn_add_agency_data").click(function(event){
        //  event.preventDefault();
        // var str = $( "#add_agency_data" ).serialize();
        // var _url = $(this).attr('href')+'/'+id;
        // console.log(str);
        // $.ajax({
        //    type: 'POST',
        //    url: "{{{ URL::route('agencydata_add' ) }}}",
        //    data: str,
        //    dataType: "html",
        //    success: function(data) {
        //      //$("#result_agency_data").empty().html(data);
        //    },
        //    error: function(XMLHttpRequest, textStatus, errorThrown) {
        //      alert('Error occured!, ' + XMLHttpRequest);
        //    }
        //  });// end $.ajax
        // });//end .nav-list a
        
      });//END document.ready