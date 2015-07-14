<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="packages/favicon.ico">

		<title>NHC-Backoffice @yield('title')</title>
		<script src="{{ Config::get('nhc/site.asset_url') }}bootstrap3/js/jquery.js"></script>
		@section('head')
			<!-- Bootstrap core CSS -->
			<link href="{{ Config::get('nhc/site.asset_url') }}bootstrap-datatables/css/dataTables.bootstrap.css" rel="stylesheet">
			
			<!-- Bootstrap Datatables -->
			<link href="{{ Config::get('nhc/site.asset_url') }}bootstrap3/css/bootstrap.css" rel="stylesheet">

			<!-- Datepicker: 
				http://www.eyecon.ro/bootstrap-datepicker/ 
				https://github.com/eternicode/bootstrap-datepicker
			-->
			<!-- <link href="{{ Config::get('nhc/site.asset_url') }}datepicker/css/datepicker.css" rel="stylesheet">
			

			
		    	https://github.com/nostalgiaz/bootstrap-switch 
		    	http://www.bootstrap-switch.org/
			-->
			<link href="{{ Config::get('nhc/site.asset_url') }}bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet">	

			<!-- Bootstrap Tour
				http://bootstraptour.com/
			-->
			<!-- <link href="{{ Config::get('nhc/site.asset_url') }}bootstrap-tour/css/bootstrap-tour.min.css" rel="stylesheet">	 -->

			<!-- multi-select
				http://davidstutz.github.io/bootstrap-multiselect/ 
				https://github.com/davidstutz/bootstrap-multiselect
			-->
			<link rel="stylesheet" href="{{ Config::get('nhc/site.asset_url') }}bootstrap-multiselect/css/bootstrap-multiselect.css" type="text/css"/>
			<link href="{{ Config::get('nhc/site.asset_url') }}font-awesome/css/font-awesome.css" rel="stylesheet">
			
			<link href="{{ Config::get('nhc/site.asset_url') }}jdatetimepicker/dtpicker.css" rel="stylesheet">

			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			  <script src="packages/bootstrap3/js/html5shiv.js"></script>
			  <script src="packages/bootstrap3/js/respond.min.js"></script>
			<![endif]-->			
		@show
		<style type="text/css">
		  	textarea { resize:none; }
		</style>
		
		<link href="{{ Config::get('nhc/site.asset_url') }}bootstrap3/css/sticky-footer.css" rel="stylesheet">
		<script type="text/javascript"> 
			var BASE = "<?php echo Request::root(); ?>/"; 

			$("#tab_changepwd").click(function(){
			    console.log('changepwd')
			     $('svg').remove()
			});//end .agencylist

			$("#tab_pwdmeter").click(function(){
			  console.log('tab_pwdmeter')
			     $('svg').remove()
			});//end .agencylist

			$("#tab_pwdsuggest").click(function(){
			  console.log('tab_pwdsuggest')
			     $('svg').remove()
			});//end .agencylist
		</script>

		<!-- http://www.webtipblog.com/adding-scroll-top-button-website/ -->
		<style>
			.scroll-top-wrapper {
			    position: fixed;
			    opacity: 0;
			    visibility: hidden;
			    overflow: hidden;
			    text-align: center;
			    z-index: 99999999;
			    background-color: #777777;
			    color: #eeeeee;
			    width: 50px;
			    height: 48px;
			    line-height: 48px;
			    right: 30px;
			    bottom: 30px;
			    padding-top: 2px;
			    border-top-left-radius: 10px;
			    border-top-right-radius: 10px;
			    border-bottom-right-radius: 10px;
			    border-bottom-left-radius: 10px;
			    -webkit-transition: all 0.5s ease-in-out;
			    -moz-transition: all 0.5s ease-in-out;
			    -ms-transition: all 0.5s ease-in-out;
			    -o-transition: all 0.5s ease-in-out;
			    transition: all 0.5s ease-in-out;
			}
			.scroll-top-wrapper:hover {
			    background-color: #888888;
			}
			.scroll-top-wrapper.show {
			    visibility:visible;
			    cursor:pointer;
			    opacity: 1.0;
			}
			.scroll-top-wrapper i.fa {
			    line-height: inherit;
			}
			 
		</style>
	</head>
	<body >
		@yield('topmenu')
		
		
		<!-- Wrap all page content here -->
    	<div id="wrap">
	    	 <!-- Success-Messages -->
	        @if ($message = Session::get('success'))
	            <div class="alert alert-success alert-block">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4>Success</h4>
	                {{{ $message }}}
	            </div>
	        @endif

	        <!-- Success-Messages -->
	        @if ($message = Session::get('warning'))
	            <div class="alert alert-warning alert-block">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4>Warning</h4>
	                {{{ $message }}}
	            </div>
	        @endif

	        <!-- Container -->
	        <div class="container">
	        	@yield('container-login')
	        	@yield('container')
	        </div> <!-- /container -->	
		</div><!-- Wrap all page content here -->

		{{-- @include('layouts.footer') --}}
		@section('bodyjs')
			<!-- Bootstrap core JavaScript
		    ================================================== -->
		    <!-- Placed at the end of the document so the pages load faster -->
		    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		    
		    <script src="{{ Config::get('nhc/site.asset_url') }}bootstrap3/js/bootstrap.min.js"></script>
		    
		    <!-- 
		    	Datepicker:
				http://www.eyecon.ro/bootstrap-datepicker/
				https://github.com/eternicode/bootstrap-datepicker
			-->
			<!--<script src="{{ Config::get('nhc/site.asset_url') }}datepicker/js/bootstrap-datepicker.js"></script>
		     
		    	https://github.com/nostalgiaz/bootstrap-switch 
		    	http://www.bootstrap-switch.org/
			-->
		    <script src="{{ Config::get('nhc/site.asset_url') }}bootstrap-switch/js/bootstrap-switch.min.js"></script>
		    
		    <!-- Bootstrap Datatables
				http://www.datatables.net/examples/styling/bootstrap.html-->
			
			<script src="{{ Config::get('nhc/site.asset_url') }}bootstrap-datatables/js/jquery.dataTables.min.js"></script>

			<script src="{{ Config::get('nhc/site.asset_url') }}bootstrap-datatables/js/dataTables.bootstrap.js"></script>

		    <!-- Bootstrap Tour
				http://bootstraptour.com/
			
			<script src="{{ Config::get('nhc/site.asset_url') }}bootstrap-tour/js/bootstrap-tour.min.js"></script>-->

			<script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}bootstrap-multiselect/js/bootstrap-multiselect.js"></script>

			<script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}zingchart/html5_scripts/zingchart-html5-min.js"></script>

			<script type="text/javascript" src="{{ Config::get('nhc/site.asset_url') }}jdatetimepicker/dtpicker.js"></script>
			
			<script type="text/javascript">
			<!-- http://www.webtipblog.com/adding-scroll-top-button-website/ -->
			$(function(){
			 
			    $(document).on( 'scroll', function(){
			 
			        if ($(window).scrollTop() > 100) {
			            $('.scroll-top-wrapper').addClass('show');
			        } else {
			            $('.scroll-top-wrapper').removeClass('show');
			        }
			    });
			});

			$(function(){
 
			    $(document).on( 'scroll', function(){
			 
			        if ($(window).scrollTop() > 100) {
			            $('.scroll-top-wrapper').addClass('show');
			        } else {
			            $('.scroll-top-wrapper').removeClass('show');
			        }
			    });
			 
			    $('.scroll-top-wrapper').on('click', scrollToTop);
			});
			 
			function scrollToTop() {
			    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
			    element = $('body');
			    offset = element.offset();
			    offsetTop = offset.top;
			    $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
			}

			$(document).ready(function(){
				$(".alert-block").fadeOut(5000);
			});
			</script>
	    @show
  </body>
</html>