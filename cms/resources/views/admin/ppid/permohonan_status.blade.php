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
                <h3 class="card-title">Tracking No : {{ $permohonan->tracking_no}}</h3>
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status Proses</label>
                    <div class="col-sm-10">
                     <select name="status_permohonan" class="form-control">
                        <option value="MENUNGGU"    @if ($permohonan->status == 'MENUNGGU')
                            @selected(true)
                        @endif>MENUNGGU</option>
                        <option value="DITERIMA" @if ($permohonan->status == 'DITERIMA')
                            @selected(true)
                        @endif>DITERIMA</option>
                        <option value="DIPROSES" @if ($permohonan->status == 'DIPROSES')
                            @selected(true)
                        @endif>DIPROSES</option>
                        <option value="DIPENUHI" @if ($permohonan->status == 'DIPENUHI')
                            @selected(true)
                        @endif>DIPENUHI</option>
                        <option value="DITOLAK" @if ($permohonan->status == 'DITOLAK')
                            @selected(true)
                        @endif>DITOLAK</option>
                     </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Status</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="summernote" name="keterangan">{{ $permohonan->keterangan }}</textarea>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-success">Simpan</button>
                  <a href="{{ url('admin/ppid/permohonan') }}" class="btn btn-default float-right">Kembali</a>
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
