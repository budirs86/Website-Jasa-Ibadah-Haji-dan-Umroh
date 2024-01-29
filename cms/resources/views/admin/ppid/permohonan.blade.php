<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src={{ asset('assets/logo/cms_logo.png') }} alt="E-Gov CMS Logo" width="60">
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Permohonan Informasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permohonan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="halaman" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th width="10">No</th>
                <th width="10">Tanggal</th>
                <th width="100">Nomor</th>
                <th width="100">Judul Informasi</th>
                <th width="100">Pemohon</th>
                <th width="100">Tujuan</th>
                <th width="100">Status</th>
                <th width="150">Action</th>
              </tr>
              </thead>
              <tbody>
                @php
                $i = 1 ;
                @endphp
                @foreach ($permohonan as $item)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ date('d-m-Y', strtotime($item->created_at)); }}</td>
                  <td>{{ $item->tracking_no }}</td>
                  <td>{{ $item->rincian }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->unit->unit_kerja }}</td>
                  <td>{{ $item->status }}</td>
                  <td>
                    <a href="{{ route('permohonan_detail', $item->id) }}" class="btn btn-xs btn-primary">Detail</a>
                    <a href="{{ route('permohonan_delete', $item->id) }}" class="btn btn-xs btn-danger">Hapus</a>
                    <a href="{{ route('permohonan_status', $item->id) }}" class="btn btn-xs btn-warning">Ubah Status</a>

                  </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
              </tbody>
              </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layouts.footer')
<script>
  $(function () {
    $("#halaman").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
