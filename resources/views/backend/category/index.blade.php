<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sunshine Fashions | Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_dashboard/dist/css/skins/_all-skins.min.css')}}">

  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-lg"><b>Sunshine</b> Fashions</span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('admin_dashboard/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->username }}</span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img src="{{asset('admin_dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                {{ Auth::user()->username }} - {{ Auth::user()->role }}
                  <small>Member since {{ Auth::user()->created_at }}</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sign out') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin_dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->username}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Top Menu</li>

        <li><a href="{{route('user.index')}}"><i class="fa fa-user"></i> <span>User List</span></a></li>
        <li><a href="{{route('category.index')}}"><i class="fa fa-book"></i> <span>Categories</span></a></li>
        <li><a href="{{route('product.index')}}"><i class="fa fa-list-alt"></i> <span>Items</span></a></li>
    </section>
  </aside>

  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Types of Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Types of Categories</li>
      </ol>
    </section>

    <section class="content">

      <div class="row">

        <section class="col-lg-12  col-md-12 col-sm-12">

            <div class="box">
            <div class="box-primary">
              <div class="box-footer clearfix no-border">
              <a  href="{{route('category.create')}}"><button type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i></button></a>
              </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $key => $category)
                     <tr>
                        <td>{{++$i}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                           <a class="btn fa fa-edit fa-lg" role="button" href="{{route('category.edit', $category->id)}}" style="color:green;"></a>
                           {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $category->id],'style'=>'display:inline']) !!}
                           {!! Form::button('<i class="fa fa-trash-o" style="color:red;"></i>', ['class'=>'btn', 'type'=>'submit']) !!}
                          {!! Form::close() !!}
                        </td>
                     </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </section>
      </div>

    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright <a>Sunshie Fashions</a>.</strong> All rights
    reserved.
  </footer>
</div>

<script src="{{asset('admin_dashboard/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin_dashboard/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('admin_dashboard/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('admin_dashboard/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('admin_dashboard/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin_dashboard/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('admin_dashboard/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin_dashboard/dist/js/demo.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
	@if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"

		switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}
	@endif
</script>

</body>
</html>
