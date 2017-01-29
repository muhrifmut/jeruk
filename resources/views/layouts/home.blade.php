<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Beranda - {{ Auth::user()->name }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/flat/blue.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('plugins/datatables/jquery.dataTables.css') }}">
  <link rel="shortcut icon" href="{{{ asset('img/resto.png') }}}">
  <style type="text/css">
    .my-group .form-control{
      width:50%;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ URL::to('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Beranda</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                            <li>
                              <a href="#"><i class="glyphicon glyphicon-user"></i> <span> {{ Auth::user()->name }}</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                        <i class="glyphicon glyphicon-log-out"></i> <span>Keluar</span>
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @if (Auth::user()->status == 'admin')
	            <li calss="treeview">
	                <a href="{{ route('pegawai.index') }}">
	                    <i class="glyphicon glyphicon-user"></i> <span>Pegawai</span>
	                </a>
	            </li>
              <li calss="treeview">
                  <a href="#">
                      <i class="glyphicon glyphicon-list-alt"></i> <span>Menu</span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{ route('menu.index') }}">Menu</a></li>
                    <li><a href="/home/menubaru">Menu Baru</a></li>
                  </ul>
              </li>
              <li calss="treeview">
                  <a href="{{ route('bahan.index') }}">
                      <i class="glyphicon glyphicon-inbox"></i> <span>Bahan</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('pesanan.index') }}">
                      <i class="glyphicon glyphicon-pencil"></i> <span>Pesanan</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('pembayaran.index') }}">
                      <i class="glyphicon glyphicon-usd"></i> <span>Pembayaran</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('kuisioner.index') }}">
                      <i class="glyphicon glyphicon-question-sign"></i> <span>Kuisioner</span>
                  </a>
              </li>
            @endif
            @if (Auth::user()->status == 'pelayan')
              <li calss="treeview">
                  <a href="{{ route('pesanan.create') }}">
                      <i class="glyphicon glyphicon-edit"></i> <span>Pesanan Baru</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('menu.index') }}">
                      <i class="glyphicon glyphicon-list-alt"></i> <span>Menu</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('pesanan.index') }}">
                      <i class="glyphicon glyphicon-inbox"></i> <span>Daftar Pesanan</span>
                  </a>
              </li>
            @endif
            @if (Auth::user()->status == 'koki')
              <li calss="treeview">
                  <a href="{{ route('pesanan.index') }}">
                      <i class="glyphicon glyphicon-list-alt"></i> <span>Pesanan</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('bahan.index') }}">
                      <i class="glyphicon glyphicon-inbox"></i> <span>Bahan</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('menu.index') }}">
                      <i class="glyphicon glyphicon-th-list"></i> <span>Menu</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ URL::to('/home/menubaru') }}">
                      <i class="glyphicon glyphicon-edit"></i> <span>Daftar Menu Baru</span>
                  </a>
              </li>
            @endif
            @if (Auth::user()->status == 'kasir')
              <li calss="treeview">
                  <a href="{{ route('pesanan.index') }}">
                      <i class="glyphicon glyphicon-inbox"></i> <span>Pesanan</span>
                  </a>
              </li>
            @endif
            @if (Auth::user()->status == 'pantry')
              <li calss="treeview">
                  <a href="{{ route('bahan.index') }}">
                      <i class="glyphicon glyphicon-inbox"></i> <span>Bahan</span>
                  </a>
              </li>
              <li calss="treeview">
                  <a href="{{ route('menu.index') }}">
                      <i class="glyphicon glyphicon-th-list"></i> <span>Menu</span>
                  </a>
              </li>
            @endif
            @if (Auth::user()->status == 'customerservice')
              <li calss="treeview">
                  <a href="{{ route('kuisioner.index') }}">
                      <i class="glyphicon glyphicon-question-sign"></i> <span>Kuisioner</span>
                  </a>
              </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <section class="content">
            @include('home.message')
            @yield('content')
        </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>

<!-- jQuery 2.2.3 -->
<script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script>
	tinymce.init({ 
		selector:'.wysiwyg',
		height: 500,
		theme: 'modern',
		plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
		],
		toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
		image_advtab: true,
		content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'
		]
	});
</script>

<!-- Bahan (Menu) -->
<script type="text/javascript">
  $(function(){
      $('#add').on('click', function() {
        var bahanterakhir = $('.tambahbahan').last();
        var tambahbahan = bahanterakhir.clone();
        tambahbahan.find('.remove')
          .attr('onclick', '$(this).parent().parent().parent().remove()')
          .attr('id', '')
          .html('<i class="glyphicon glyphicon-minus"></i>');
        tambahbahan.find('.label-bahan').text('');
        tambahbahan.find('.jumlah-bahan').val('');
        tambahbahan.find('.class-bahan').val('');
        tambahbahan.find('.class-satuan').val('');
        bahanterakhir.after(tambahbahan);
      });
  });
</script>

<!-- Menu (Pemesanan) -->
<script type="text/javascript">
  $(function(){
      $('#addmenu').on('click', function() {
        var menuterakhir = $('.menu').last();
        var menu = menuterakhir.clone();
        menu.find('.removemenu')
          .attr('onclick', '$(this).parent().parent().parent().remove()')
          .attr('id', '')
          .html('<i class="glyphicon glyphicon-minus"></i>');
        menu.find('.label-menu').text('');
        menu.find('.jumlah-menu').val('');
        menu.find('.bahan').val('');
        menuterakhir.after(menu);
      });
  });
</script>

<!-- Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#table').DataTable();
  });
</script>
</body>
</html>
