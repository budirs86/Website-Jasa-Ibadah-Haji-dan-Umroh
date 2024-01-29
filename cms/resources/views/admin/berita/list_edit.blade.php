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
            <h1>Berita</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Berita</li>
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
                <h3 class="card-title">Edit Berita</h3>
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
              <form class="form-horizontal" action="{{ route('list_berita_update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="id" class="form-control" value="{{ $berita->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                      <input type="text" name="category" class="form-control" placeholder="Judul" value="{{ $berita->category->title }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                      <label class="form-control">{{ $berita->title }}</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Konten</label>
                    <div class="col-sm-10">
                    <p>{!! html_entity_decode($berita->content) !!}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Feature Image</label>
                    <div class="col-sm-10">
                      <img src="{{ asset('images/berita/'.$berita->pic)}}" width="400"><br>
                     </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tampilkan di Portal Utama</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control" style="width: 200px">
                          <option value="0" @if (($berita->portal) == 0 )
                            @selected(true)
                        @endif>0</option>
                          <option value="1" @if (($berita->portal) == 1 )
                            @selected(true)
                        @endif>1</option>
                      </select>
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a href="{{ url('admin/list_berita') }}" class="btn btn-default float-right">Batal</a>
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
