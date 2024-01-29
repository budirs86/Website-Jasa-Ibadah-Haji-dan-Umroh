<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
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
            <h1 class="m-0">Slide</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slide</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('slide_create') }}" class="btn btn-sm btn-primary float-right btn-flat">Tambah Slide</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="halaman" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th width="10">No</th>
                <th width="500">Judul</th>
                <th width="500">Slide</th>
                <th width="80">Tanggal</th>
                <th width="125">Action</th>
              </tr>
              </thead>
              <tbody>
                @php
                $i = 1 ;    
                @endphp
                @foreach ($slide as $item)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $item->title }}</td>
                  <td><img src="{{ asset('images/slide/'.$item->pic) }}" width="200" height="100"></td>
                  <td>{{ $item->created_at->format('d/m/Y') }}</td>
                  <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('slide_destroy', $item->id) }}" method="POST">
                      <a href="{{ route('slide_edit', $item->id) }}" class="btn btn-xs btn-primary">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                  </form>
                  
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
