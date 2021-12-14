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
        Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">edit</li>
      </ol>
    </section>

    <section class="content">

      <div class="row">

        <section class="col-lg-12  col-md-12 col-sm-12">

            <div class="box">
                <div class="box-primary">
                    <div class="box-footer clearfix no-border">
                        <a  href="{{ route('product.index') }}"><button type="button" class="btn btn-success pull-left"> Back</button></a>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="box-body">
                    <img class="img-responsive" src="/photo/{{ $product->avatar }}" alt="" height="200" width="200">
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name"  name="name" value="{{$product->name}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="avatar">Picture</label>
                              <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror">
                                  @error('avatar')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Unit Price</label>
                                <input type="text" class="form-control" id="real_price" value="{{$product->real_price}}"" name="real_price">
                                    @error('real_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input type="text" class="form-control" id="price" value="{{$product->price}}" name="price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="brand">Code:</label>
                                <input type="text" class="form-control" id="code" value="{{$product->code}}" name="code">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Main Category:</label>
                                <select class="form-control select2" name="brand">
                                    <option disabled selected>{{$product->brand}}</option>
                                    <?php foreach($brand as $pt): ?>
                                    <option value="{{$pt->name}}">{{$pt->name}}</option>
                                    <?php endforeach; ?>
                                </select>
                                @if($errors->has('brand'))
                                {!! $errors->first('brand', '<p class="text-danger">:message</p>') !!}
                                @endif
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group"  maxlength="4" size="4">
                                <label for="status">Availability</label>
                                <select class="form-control select2" name="status">
                                    <option disabled selected>{{$product->status}}</option>
                                    <option>In stock</option>
                                    <option>Out of Stock</option>
                                </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="form-group">
                            <label for="description">Description</label>
                                <textarea class="form-control" rows="3" name="description" id="description">{{ old('description', $product->description) }}</textarea>
                            </div>

                        </div>

                        <div class="col-md-7">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

</body>
</html>
