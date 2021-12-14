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
  <link rel="stylesheet" href="{{asset('admin_dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('admin_dashboard/dist/css/AdminLTE.min.css')}}">

  <link rel="stylesheet" href="{{asset('admin_dashboard/dist/css/skins/_all-skins.min.css')}}">


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
        <li class="active">Products</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-primary">
              <div class="box-footer clearfix no-border">
              <a  href="{{route('product.create')}}"><button type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i></button></a>
              </div>
              
            </div>
            <div class="box-body">

              <div class="row">
              <div class="col-md-2">
                  <div class="form-group">
                    <label>Category:</label>
                    <select class="form-control select2" name="brand" id="brand">
                      <?php foreach($brand as $key => $pt): ?>
                        <option value="{{$pt->name}}">{{$pt->name}}</option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group filter" >
                    <label>Status:</label>
                    <select class="form-control select2" name="status" id="status">
                      <option>In stock</option>
                      <option>Out of Stock</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Code:</label>
                    <select class="form-control select2" name="code" id="code">
                      <?php foreach($data as $key => $pt): ?>
                        <option value="{{$pt->code}}">{{$pt->code}}</option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-primary rounded" id="search" name="search">Search</button>
                  </div>
                </div>
              </div>


              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                    <th>Product Name</th>
                    <th>Brand Name</th>
                    <th>Code</th>
                    <th>picture</th>
                    <th>Unit Price</th>
                    <th>Price</th>
                    <th>Availability</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $product)
                     <tr>
                        <td>{{++$i}}</td>
                        <td>{{$product->name}}</td>
                        <td><small class="label label-success">{{ $product->brand }}</small></td>
                        <td><smal class="label label-warning">{{ $product->code }}</small></td>
                        <td><img src="/photo/{{ $product->avatar }}" height="250" width="200"/></td>
                        <td>Rs. {{$product->real_price}}.00<a class="btn fa fa-pencil" role="button" href="{{route('product.edit_price', $product->id)}}" style="color:blue;"></a></td>
                        <td>Rs. {{$product->price}}.00</td>
                        <td>{{$product->status}}</td>
                        <td>{{$product->description}}</td>
                        <td style="width:150px;">
                           <a class="btn fa fa-pencil fa-lg" role="button" href="{{route('product.edit', $product->id)}}" style="color:bliue;"></a>

                           {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id],'style'=>'display:inline']) !!}
                           {!! Form::button('<i class="fa fa-trash-o" style="color:red;"></i>', ['class'=>'btn', 'type'=>'submit']) !!}
                          {!! Form::close() !!}
                        </td>
                     </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  

  <footer class="main-footer">
    <strong>Copyright <a>Sunshie Fashions</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('admin_dashboard/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin_dashboard/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('admin_dashboard/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin_dashboard/dist/js/demo.js')}}"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>





<script>
		$(document).ready(function () {
	            $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': '{{csrf_token()}}'
	                }
	            });

	            $('.xedit').editable({
	                url: '{{url("price/update")}}',
	                title: 'Update',
	                success: function (response, newValue) {
	                    console.log('Updated', response)
	                }
	            });

	    })
	</script>

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var product_id = $(this).data('id'); 
         console.log(status);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'product_id': product_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>


<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('product.index') }}",
          data: function (d) {
                d.brand = $('#brand').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'brand', name: 'brand'},
            {data: 'status', name: 'status'},
        ]
    });
  
    $('#brand').change(function(){
        table.draw();
    });
      
  });
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
