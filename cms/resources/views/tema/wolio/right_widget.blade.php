
<div class="most-recent-area">
  <aside class="single_sidebar_widget post_category_widget">
    <h6 class="small-tittle mb-20"><strong>KATEGORI</strong></h6>
    <ul class="list cat-list">
        <ol class="list-group list-group-numbered">
            @php
            $cats = App\Models\Category::where('unit_id', $unit)->get();
            @endphp
            @foreach ($cats as $cat_item)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold"><a href="{{ route('berita_category', 'id='.$cat_item->id) }}" style="color:rgb(25, 25, 27);">{{ $cat_item->title}}</a></div>
              </div>
              @php
              $news_count = App\Models\Berita::where('unit_id', $unit)
                            ->where('category_id', $cat_item->id)->count();
            @endphp
              <span class="badge bg-light rounded-pill">{{ $news_count }}</span>
            </li>
            @endforeach
          </ol>
      {{-- @php
          $cats = App\Models\Category::where('unit_id', $unit)->get();
      @endphp
      @foreach ($cats as $cat_item)
      <li>
        <a href="{{ route('berita_category', 'id='.$cat_item->id) }}" class="d-flex">
            <p>{{ $cat_item->title }}</p>
            <p>
            @php
              $news_count = App\Models\Berita::where('unit_id', $unit)
                            ->where('category_id', $cat_item->id)->count();
            @endphp
            ({{ $news_count }})
          </p>
        </a>
      </li>
      @endforeach --}}
    </ul>
  </aside>

  </div>
  <span><br></span>
  <div class="most-recent-area">
    <!-- Section Tittle -->
    <div class="small-tittle mb-20">
        <h4>INFOGRAFIS</h4>
    </div>
    <a href="{{route('daftar_info')}}"><img src="{{ asset('images/info/'.$info[0]->pic)}}" id="img" width="100%" height="350"></a>

    <!-- Details -->
    {{-- <div class="small-tittle mb-20">
      <h4>GPR KOMINFO</h4>
  </div>
    <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
    <div id="gpr-kominfo-widget-container"></div>
  </div> --}}

</div>
