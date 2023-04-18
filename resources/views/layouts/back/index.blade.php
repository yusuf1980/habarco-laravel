<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>@yield('title', 'Admin | Dashboard')</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{asset('b/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('b/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  @yield('cssin') 
  @yield('css')
  <link rel="stylesheet" href="{{asset('b/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('b/css/skins/_all-skins.min.css')}}">
  @yield('style')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  @include('layouts.back.header')

    @include('layouts.back.sidebar-left-menu')

    <div class="content-wrapper">
    
      

      @yield('content')

    </div>
    <!-- /.content-wrapper -->

  <footer class="main-footer">
    
    <strong>Copyright &copy; 2016 <a href="{{url('/')}}">Wamet</a>.</strong> All rights
    reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<script src="{{asset('b/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<script src="{{asset('b/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('b/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('b/js/app.min.js')}}"></script>
<script src="{{asset('b/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('b/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('b/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('b/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('b/plugins/chartjs/Chart.min.js')}}"></script>
@yield('js')
<script>
        $(document).ready(function(){
            $('#focus').focus();
        });
</script>
<script>
  function delete_confirm(link) {
    var msg = confirm('Anda yakin untuk melanjutkan penghapusan ini?');
    if(msg == false) {
      return false;
    }
  }
</script>

</body>
</html>
