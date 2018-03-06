
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>CLICKEE | Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    @yield('additional-styles')
    
    <script type="text/javascript">
        var base_url = {!! "'".URL::to('/')."/'" !!};
    </script>


</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

    <!-- header part -->



<!-- Content Wrapper. Contains page content -->
    @include('front.layout.header')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('front.layout.footer')
    
</div>
@yield('additional-script')
</body>
</html>
