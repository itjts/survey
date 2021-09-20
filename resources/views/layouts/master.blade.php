<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jatim Taman Steel | Database Pegawai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminlte/css/ionicons.min.css">

  <link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/css/adminlte.min.css">

  <link rel="stylesheet" href="adminlte/css/ionicons.min.css">
  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="adminlte/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Jatim Taman Steel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="home" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Grafik Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Database Pegawai
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="database" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pegawai</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="tambahpegawai" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Tambah Data Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="resign" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Resign
                </p>
              </a>
            </li>
            <li class="nav-item">
							<a href="cuti" class="nav-link">
								<i class="nav-icon fas fa-flag"></i>
								<p>
									Sisa Cuti
								</p>
							</a>
						</li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="adminlte/plugins/datatables/jquery.dataTables.js"></script>
  <script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="adminlte/js/adminlte.min.js"></script>

  <script src="adminlte/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="adminlte/js/demo.js"></script>

  <!-- page script -->
  <script>
    $(function() {
      $('#example1').DataTable({
        "scrollX": true,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
      
    });

    $(document).ready(function() {
      var max_fields = 2; //maximum input boxes allowed
      var wrapper = $(".input_fields_wrap"); //Fields wrapper
      var add_button = $(".add_field_button"); //Add button ID

      var x = 1; //initlal text box count
      $(add_button).click(function(e) { //on add input button click

        if (x < max_fields) { //max input box allowed

          $(wrapper).append('{{ csrf_field() }}');
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Nama Anak </label><div class="col-sm-9"><input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="Nama Anak"></div></div>'); //add input box
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Tanggal Lahir Anak</label><div class="col-sm-9"><input type="text" name="tanggal_anak" id="tanggal_anak" class="form-control" placeholder="Tanggal Lahir Anak"></div></div>')
          $(wrapper).append('<div align="center"><input type=\'submit\' value="simpan" class="btn bg-gradient-success"></input></div>');
          $(wrapper).append('<br>');

          x++; //text box increment
        }
        e.preventDefault();
      });

      $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $("#divs").remove();
        x--;

      })

    });

    $(document).ready(function() {
      var max_fields = 2; //maximum input boxes allowed
      var wrapper = $(".input_fields_suami_istri"); //Fields wrapper
      var add_button = $(".add_suami_istri_button"); //Add button ID

      var x = 1; //initlal text box count
      $(add_button).click(function(e) { //on add input button click

        if (x < max_fields) { //max input box allowed

          $("#rm").remove();

          $(wrapper).append('{{ csrf_field() }}');
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Tanggal Menikah</label><div class="col-sm-9"><input type="text" name="tgl_menikah" id="tgl_menikah" class="form-control" placeholder="Tanggal Menikah"></div></div>');
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Nama Istri/Suami</label><div class="col-sm-9"><input type="text" name="nama_pasangan" id="nama_pasangan" class="form-control" placeholder="Nama Istri/Suami"></div></div>'); //add input box
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Tanggal Lahir Istri/Suami</label><div class="col-sm-9"><input type="text" name="tgl_lahir_pasangan" id="tgl_lahir_pasangan" class="form-control" placeholder="Tanggal Lahir Istri/Suami"></div></div>')
          $(wrapper).append('<div align="center"><input type=\'submit\' value="simpan" class="btn bg-gradient-success"></input></div>');
          $(wrapper).append('<br>');

          x++; //text box increment
        }
        e.preventDefault();
      });

      $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $("#divs").remove();
        x--;

      })
    });

    $(document).ready(function() {
      var max_fields = 2; //maximum input boxes allowed
      var wrapper = $(".input_fields_pendidikan"); //Fields wrapper
      var add_button = $(".add_field_pendidikan"); //Add button ID

      var x = 1; //initlal text box count
      $(add_button).click(function(e) { //on add input button click

        if (x < max_fields) { //max input box allowed

          $(wrapper).append('{{ csrf_field() }}');
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Pendidikan</label><div class="col-sm-9"><input type="text" name="pendidikan" id="pendidikan" class="form-control" placeholder="Pendidikan"></div></div>'); //add input box
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Instansi</label><div class="col-sm-9"><input type="text" name="instansi" id="instansi" class="form-control" placeholder="Instansi"></div></div>')
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Jurusan</label><div class="col-sm-9"><input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan"></div></div>')
          $(wrapper).append('<div align="center"><input type=\'submit\' value="simpan" class="btn bg-gradient-success"></input></div>');
          $(wrapper).append('<br>');

          x++; //text box increment
        }
        e.preventDefault();
      });

      $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $("#divs").remove();
        x--;

      })
    });


    $(document).ready(function() {
      var max_fields = 2; //maximum input boxes allowed
      var wrapper = $(".input_fields_prestasi"); //Fields wrapper
      var add_button = $(".add_field_prestasi"); //Add button ID

      var x = 1; //initlal text box count
      $(add_button).click(function(e) { //on add input button click

        if (x < max_fields) { //max input box allowed

          $(wrapper).append('{{ csrf_field() }}');
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Prestasi</label><div class="col-sm-9"><input type="text" name="prestasi" id="prestasi" class="form-control" placeholder="Prestasi"></div></div>'); //add input box
          $(wrapper).append('<div class="form-group row"><label class="col-sm-3 col-form-label">Dicapai Tahun</label><div class="col-sm-9"><input type="text" name="tahun_prestasi" id="tahun_prestasi" class="form-control" placeholder="Tahun"></div></div>');

          $(wrapper).append('<div align="center"><input type=\'submit\' value="simpan" class="btn bg-gradient-success"></input></div>');
          $(wrapper).append('<br>');

          x++; //text box increment
        }
        e.preventDefault();
      });



    });


    
  </script>
</body>

</html>