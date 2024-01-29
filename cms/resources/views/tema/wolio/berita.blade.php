    @include('tema.wolio.header')
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($berita as $item_berita)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('images/berita/'.$item_berita->pic)}}" alt="" width="750" height="375">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ date('d', strtotime($item_berita->created_at))}}</h3>
                                    <p>{{ date('M', strtotime($item_berita->created_at))}}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('berita_detail',$item_berita->slug) }}">
                                    <h2>{{ $item_berita->title}}</h2>
                                </a>
                                <p>{{ Str::of(strip_tags($item_berita->content))->words(50, ' ....') }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $item_berita->penulis->name}}</a></li>
                                    <li><a href="#"><i class="fa fa-newspaper"></i> {{ $item_berita->category->title}}</a></li>
                                    <li><a href="#"><i class="fa fa-newspaper"></i> {{ $item_berita->unit->unit_kerja}}</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {!! $berita->withQueryString()->links('pagination::bootstrap-5') !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="{{ route('cari_berita')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="search" type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    @include('tema.wolio.footer')
