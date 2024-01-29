    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="index.html" class="logo m-0 float-start">
                <img src="{{asset('tema/haji/images/logohaji.png')}}" alt="" width="200px">
            </a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                <li class="active"><a href="{{route('home')}}">BERANDA</a></li>
                @foreach ($menu  as $item)
                @php
                $childs = App\Models\Menu::where('parent_id', $item->id)->where('unit_id', $unit)->orderBy('sort', 'DESC')->get();
                $count = count($childs);
                @endphp

                <li class="has-children">
                <a href="{{ $item->link }}">{{ $item->title }}</a>
                @if ($count > 0)
                    <ul class="dropdown">
                        @foreach ($childs as $child)
                            @php
                                $slug = App\Models\Pages::where('id', $child->link)->where('unit_id', $unit)->first();
                            @endphp
                            @if ($slug)
                                <li><a href="{{ route('pages_detail',$slug->slug) }}">{{ $child->title }}</a></li>
                            @else
                                <li><a href="{{ $child->link }}">{{ $child->title }}</a></li>
                            @endif

                        @endforeach
                    </ul>
                @endif
                </li>
                @endforeach
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>
