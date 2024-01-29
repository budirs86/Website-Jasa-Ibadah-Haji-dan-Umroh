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
            <h1>Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
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
                <h3 class="card-title">Menu</h3>
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
              <form class="form-horizontal" action="{{ route('menu_update') }}" method="POST">
                {{ csrf_field() }}
                <input name="id"  type="hidden" class="form-control" value="{{ $menu_edit->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Induk/Sub Menu</label>
                    <div class="col-sm-10">
                      <select name="parent_id" class="form-control select select2" id="link">
                          <option value="0"> INDUK</option>
                          @foreach ($menu as $menu_item)
                              <option value="{{ $menu_item->id}}" @if (($menu_item->id) == $menu_edit->parent_id)
                                  @selected(true)
                              @endif>{{ $menu_item->title}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- @php
                    $link_status = filter_var($menu_edit->link, FILTER_VALIDATE_URL);

                    dd($link_status);
                  @endphp --}}
                @if (filter_var($menu_edit->link, FILTER_VALIDATE_URL))
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                          <select name="link" class="form-control select select2" id="link" onchange="showDiv(this)">
                            <option value="/"> INDUK</option>
                            @foreach ($link as $link_item)
                                <option value="{{ $link_item->id}}"  @if (($link_item->id) == $menu_edit->link)
                                  @selected(true)
                              @endif>{{ $link_item->title}}</option>
                            @endforeach
                            <option value="external" selected>External link</option>
                            <script type="text/javascript">
                              function showDiv(select){
                                if(select.value=='external'){
                                  document.getElementById('manual_link').style.display = "block";
                                } else{
                                  document.getElementById('manual_link').style.display = "none";
                                }
                              } 
                              </script>
                          </select>
                    </div>
                  </div>
                  <div id="manual_link">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Eksternal Link</label>
                      <div class="col-sm-8">
                        <input type="text" name="manual_link" class="form-control" placeholder="Manual Link" value="{{ $menu_edit->link }}">
                      </div>
                    </div>
                  </div>
                @else
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Link</label>
                  <div class="col-sm-10">
                        <select name="link" class="form-control select select2" id="link" onchange="showDiv(this)">
                          <option value="/"> INDUK</option>
                          @foreach ($link as $link_item)
                              <option value="{{ $link_item->id}}"  @if (($link_item->id) == $menu_edit->link)
                                @selected(true)
                            @endif>{{ $link_item->title}}</option>
                          @endforeach
                          <option value="external">External link</option>
                          <script type="text/javascript">
                            function showDiv(select){
                              if(select.value=='external'){
                                document.getElementById('manual_link').style.display = "block";
                              } else{
                                document.getElementById('manual_link').style.display = "none";
                              }
                            } 
                            </script>
                        </select>
                  </div>
                </div>
                <div id="manual_link" style="display:none;">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Eksternal Link</label>
                    <div class="col-sm-8">
                      <input type="text" name="manual_link" class="form-control" placeholder="Manual Link">
                    </div>
                  </div>
                </div>
              
                @endif

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" value="{{ $menu_edit->title }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Urutan</label>
                    <div class="col-sm-10">
                      <input type="number" name="urutan" class="form-control" value="{{ $menu_edit->sort}}">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a href="{{ route('menu') }}" class="btn btn-default float-right">Batal</a>
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
    function showDiv(select){
      if(select.value=='external'){
        document.getElementById('manual_link').style.display = "block";
      } else{
        document.getElementById('manual_link').style.display = "none";
      }
    };xdx


    $('#summernote').summernote({
      height: "300px",
      styleWithSpan: false
    });
  }); 
</script>
</body>
</html>
