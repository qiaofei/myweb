<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{"BigMan 兑换系统"}}</title>
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
<script src="{{ asset('admin-assets/js/common.js') }}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('admin-assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/admin')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">后台</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">管理后台</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- 侧边栏 button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <a href="{{ url('/') }}" target="_blank">
                  <i class="fa fa-home" title="前台首页"></i>
                  <span class="label label-info">H</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('admin-assets/dist/img/avatar5.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <B>{{ Auth::user()->name }}</B>
              {{--<a href="#"><i class="fa fa-circle text-success"></i> 在线</a>--}}
            </div>
          </div>
          <!-- search form -->
          <!--
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="搜索..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">{{"主导航栏"}}</li>

            {{--<li class="treeview">--}}
              {{--<a href="#">--}}
                {{--<i class="fa fa-edit"></i> <span>{{"CD KEY"}}</span>--}}
                {{--<i class="fa fa-angle-left pull-right"></i>--}}
              {{--</a>--}}
              {{--<ul class="treeview-menu">--}}
                {{--<li><a href="{{ url('/admin/') }}"><i class="fa fa-circle-o"></i>{{"KEY 列表"}}</a></li>--}}
                {{--<li><a href="{{ url('/admin/unused') }}"><i class="fa fa-circle-o"></i>{{"未使用"}}</a></li>--}}
                {{--<li><a href="{{ url('/admin/used') }}"><i class="fa fa-circle-o"></i>{{"已使用"}}</a></li>--}}
                {{--<li><a href="{{ url('/admin/expire') }}"><i class="fa fa-circle-o"></i>{{"已过期"}}</a></li>--}}
              {{--</ul>--}}
            {{--</li>--}}

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>{{"客服中心"}}</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-circle-o"></i>{{"游戏常见问题"}}</a></li>
                <li><a href="{{ url('/admin/server/as') }}"><i class="fa fa-circle-o"></i>{{"账号与安全"}}</a></li>
                <li><a href="{{ url('/admin/server/title') }}"><i class="fa fa-circle-o"></i>{{"归属问题"}}</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>{{"声明"}}</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/declare/disclaimer') }}"><i class="fa fa-circle-o"></i>{{"免责声明"}}</a></li>
                <li><a href="{{ url('/admin/declare/privacy') }}"><i class="fa fa-circle-o"></i>{{"隐私政策"}}</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>{{"新闻公告"}}</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/news/index') }}"><i class="fa fa-circle-o"></i>{{"新闻"}}</a></li>
                <li><a href="{{ url('/admin/notice/index') }}"><i class="fa fa-circle-o"></i>{{"公告"}}</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>{{"管理员"}}</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/setup/adminList') }}"><i class="fa fa-circle-o"></i>{{"管理员列表"}}</a></li>
                <li><a href="{{ url('/admin/setup/adminLog') }}"><i class="fa fa-circle-o"></i>{{"操作日志"}}</a></li>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
          @if(is_object($errors))
            @if (count($errors) > 0)
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="icon fa fa-ban"></i>  填写表单出错了哦！</p>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          @else
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-ban"></i>  出错了哦！</p>
              <ul>
                <li>{{ $errors }}</li>
              </ul>
            </div>
          @endif

          @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-check"></i>  {{Session::get('message')}}</p>

            </div>
          @endif
        @yield('content')
      </section>
    </div><!-- /.content-wrapper -->
    <!--
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          {{--<b>Version</b> 0.1--}}
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="http://www.bgameb.com" target="_blank">{{"比格游戏"}}</a>.</strong> All rights reserved.
      </footer>
-->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      {{--<div class="control-sidebar-bg"></div>--}}

    </div><!-- ./wrapper -->


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
    <!-- 添加的外部list.js -->
    <script src="{{ asset('admin-assets/js/list.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('ul.treeview-menu>li').find('a[href="{{ url(Request::getRequestUri()) }}"]').closest('li').addClass('active');  //二级链接高亮
        $('ul.treeview-menu>li').find('a[href="{{ url(Request::getRequestUri()) }}"]').closest('li.treeview').addClass('active');  //一级栏目[含二级链接]高亮
        $('.sidebar-menu>li').find('a[href="{{ url(Request::getRequestUri()) }}"]').closest('li').addClass('active');  //一级栏目[不含二级链接]高亮
      });
    </script>
     <script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $("#tag_list").select2({
            placeholder:'选择标签',
            tags:true
        });
      });
    </script>

  </body>
</html>
