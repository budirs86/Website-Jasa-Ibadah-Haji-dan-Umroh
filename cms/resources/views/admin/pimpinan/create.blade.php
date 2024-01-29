<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition sidebar-mini">
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
            <h1>Pimpinan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pimpinan</li>
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
          <div class="col-md-10">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Pimpinan</h3>
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
              <form class="form-horizontal" action="{{ route('pimpinan_store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pimpinan</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama Pimpinan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan Pimpinan</label>
                    <div class="col-sm-10">
                      <input type="text" name="jabatan" class="form-control" id="inputEmail3" placeholder="Jabatan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Masa Jabatan</label>
                    <div class="col-sm-10">
                      <input type="text" name="masa_jabatan" class="form-control" id="inputEmail3" placeholder="Masa Jabatan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <select name="aktif" class="form-control" style="width: 150px">
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <input type="file" name="images" class="form-control" id="inputEmail3" placeholder="image">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Halaman Sambutan</label>
                    <div class="col-sm-10">
                      <select name="sambutan" class="form-control" style="width: 400px">
                        <option value="#">Silakan Pilih</option>
                        @foreach ($pages as $item)
                        <option value="{{ $item->id }}">{{ $item->title}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a href="{{ url('admin/pimpinan') }}" class="btn btn-default float-right">Batal</a>
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
