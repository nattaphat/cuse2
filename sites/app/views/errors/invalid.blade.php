@extends('layouts.master')
<style>
  .hero-unit{
      padding:60px;
      margin-bottom:30px;
      font-size:18px;
      font-weight:200;
      line-height:30px;
      color:inherit;
      background-color:#eeeeee;
      -webkit-border-radius:6px;
      -moz-border-radius:6px;
      border-radius:6px;
  }
  .hero-unit h1{
    margin-bottom:0;
    font-size:60px;
    line-height:1;
    color:inherit;
    letter-spacing:-1px;
  }

  .hero-unit li{
    line-height:30px;
  }

  .center {
    text-align: center; 
    margin-left: auto; 
    margin-right: auto; 
    margin-bottom: auto; 
    margin-top: auto;
  }
</style>
<title>Invalid Access</title>
<body>
  <div class="hero-unit center">
    <h1>Page Not Found <small><font face="Tahoma" color="red">Invalid Access !</font></small></h1>
    <br />
    <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
    <p><b>Or you could just press this neat little button:</b></p>
    <a href="{{ URL::to('/')}}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
  </div>
  <p></p>
  
    
  <!-- By ConnerT HTML & CSS Enthusiast -->  