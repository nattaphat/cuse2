@extends('layouts.master')

@section ('head')
  @parent
  <!-- Custom styles for this template -->
  <link href="{{ Config::get('nhc/site.asset_url') }}bootstrap3/css/offcanvas.css" rel="stylesheet">
@stop

@section ('topmenu')
  @include('layouts.topmenu')
@stop

@section ('container')
  <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-lg-12">
            @yield('admincontent')
      </div><!--/col-lg-12-->
    </div><!--/row-->
@stop

@section ('bodyjs')
  @parent
  <!-- Custom js for this template -->
  <script src="{{ Config::get('nhc/site.asset_url') }}nhc_script.js"></script>
@stop