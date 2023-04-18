<?php $set = $setting->where('key','title')->first(); ?>
  <?php $desc = $setting->where('key','meta_description')->first(); ?>
  <?php $keywords = $setting->where('key','meta_keyword')->first(); ?>
  <?php $analytic = $setting->where('key','google_analytics')->first(); ?>
  <?php $sitename = $set->where('key', 'sitename')->first(); ?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:type" content="article" />
  <meta property="og:site_name" content="{{$sitename->value}}" />
  <meta property="og:title" content="@yield('title', $set->value )" />
  @yield('image')
  @yield('facebook')
  <meta property="og:description" content="@yield('desc', $desc->value)" />
  <meta property="og:url" content="@yield('url', 'http://wamet.id')">
  <meta property="fb:app_id" content="322939754714273" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="@yield('desc', $desc->value)" />
  <meta name="twitter:title" content="@yield('title', $set->value )" />
  <!--meta name="twitter:site" content="@wamet" />
  <meta name="twitter:creator" content="@wamet" /-->
  @yield('imagetwitter')

  <meta name="robots" content="index, follow">
  <meta name="description" content="@yield('desc', $desc->value)">
  <meta name="keywords" content="@yield('keywords', $keywords->value)">
  <title>@yield('title', $set->value )</title>

  @yield('css')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="{{asset('f/css/icomoon.css')}}" />
  <link rel="stylesheet" href="{{asset('f/css/superfish.css')}}" />
  <link rel="stylesheet" href="{{asset('f/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('f/css/stylist.css')}}" />
  <link rel="stylesheet" href="{{asset('f/css/style2.css')}}" />
  <link rel="stylesheet" href="{{asset('f/css/responsive.css')}}" />
  <link rel="stylesheet" href="{{asset('f/css/mobile.css')}}" />
  
	<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie.css">
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="js/PIE_IE678.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
</head>

@yield('body')

@include('layouts.front.header')

@yield('content')

@include('layouts.front.bottom-sidebar')

<!-- page footer -->

<span class="back-to-top icon-arrow-up"></span>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="{{asset('f/js/superfish.js')}}"></script>
<script src="{{asset('f/js/jquery.carousel-6.2.1.js')}}"></script>
<script src="{{asset('f/js/jflickrfeed.min.js')}}"></script>
<script src="{{asset('f/js/tweetable.jquery.js')}}"></script>
<script src="{{asset('f/js/jquery.timeago.js')}}"></script>
<script src="{{asset('f/js/jquery.form.js')}}"></script>
<script src="{{asset('f/js/jquery.validate.min.js')}}"></script>
@yield('js')
<script src="{{asset('f/js/custom.js')}}"></script>
@yield('singlejs')

  <div id="fb-root"></div>
  <script>
  /*(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.6";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));*/</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '322939754714273',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/id_ID/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  <?PHP echo $analytic->value ?>
</script>
</body>
</html>