<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ DL_WEBNAME }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->

        <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="{{ asset('admin-assets/dist/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset('admin-assets/dist/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('admin-assets/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Select2 -->
        <link href="{{ asset('admin-assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="{{ asset('admin-assets/dist/css/skins/skin-blue.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-assets/bootstrap/css/common.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-assets/css/common.css')}}" rel="stylesheet" type="text/css" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 2.1.4 -->
        <script src="{{ asset('admin-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset('admin-assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <script>
            //ajax设置
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

    </head>
    <body>
    @yield('content')
    <!-- SlimScroll -->
    <script src="{{ asset('admin-assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin-assets/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-assets/dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Select2 -->
    <script src="{{ asset('admin-assets/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="{{ asset('admin-assets/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/dist/js/common.js') }}" type="text/javascript"></script>
    <!-- 加载default.js-->
    <script type="text/javascript" src="{{ asset('js/default.js') }}"></script>
    <script type="text/javascript" src="{{ asset('layer/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('layer/laydate/laydate.js') }}"></script>
    <script>
        $("#closewin").click(function(){
            parent.layer.close(parent.layer.getFrameIndex(window.name));
        });
        $("#yes").click(function(){
            window.location.reload();parent.layer.close(parent.layer.getFrameIndex(parent.window.name));
        });
    </script>
    </body>
</html>