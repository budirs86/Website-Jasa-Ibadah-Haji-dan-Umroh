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
<nav class="main-header navbar navbar-expand navbar-blue navbar-light bg-blue">
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Permohonan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permohonan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tracking No : {{ $permohonan->tracking_no}}, Status : {{ $permohonan->status }}</h3>
              </div>
              <!-- /.card-header -->
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('permohonan_update') }}" method="POST">
                {{ csrf_field() }}
                <input name="id" type="hidden" value="{{ $permohonan->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori Pemohon</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->kategori_pemohon }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pemohon</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->nama }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Identitas</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->nomor_identitas }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->alamat }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->pekerjaan }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->no_tlp }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->email }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Rincian Yang Dibutuhkan</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->rincian }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan Pengajuan Informasi</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->tujuan }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Cara memperoleh informasi</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->cara_memperoleh }}</label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Cara mendapat informasi</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $permohonan->cara_mendapat }}</label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Foto Identitas</label>
                    <div class="col-sm-10">
                      <img src="http://localhost/baubau/ppid/file/{{ $permohonan->file_name }}" width="400" height="200">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{ url('admin/ppid/permohonan') }}" class="btn btn-default float-right">Batal</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
@include('layouts.footer')
<script type="text/javascript">
  $(document).ready(function() {
    $('#summernote').summernote({
      height: "300px",
      styleWithSpan: false
    });
  });
</script>
</body>
</html>
