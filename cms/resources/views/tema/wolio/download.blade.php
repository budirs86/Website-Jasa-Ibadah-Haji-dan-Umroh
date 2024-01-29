@include('tema.wolio.header')
<!--================Blog Area =================-->
<section class="blog_area section-padding">
		<div class="container">
			<h4>DOWNLOAD FILE</h4><br><br>
				<div class="row">
						<div class="col-lg-8 mb-5 mb-lg-0">
								<div class="blog_left_sidebar">
									<table class="table">
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th width="500">Nama File</th>
                                                <th width="100">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($file as $file_item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $file_item->title }}</td>
                                                <td><a href="{{ asset('files/'.$file_item->file_name)}}" download class="btn btn-sm">Download</td>
                                            </tr>
                                            @endforeach
                                        </tbody>



										{{-- <article class="blog_item">
												<div class="blog_item_img">
														<img class="card-img rounded-200" src="{{ asset('files/'.$file_item->pic)}}" alt="" width="750" height="375">
														<a href="#" class="blog_item_date">
																<h3>{{ date('d', strtotime($file_item->created_at))}}</h3>
																<p>{{ date('M', strtotime($file_item->created_at))}}</p>
														</a>
												</div>

												<div class="blog_details">
														<a class="d-inline-block" href="{{ route('info_detail',$file_item->id) }}">
																<h2>{{ $file_item->title}}</h2>
														</a>
														<ul class="blog-info-link">
																<li><a href="#"><i class="fa fa-user"></i> {{ $file_item->penulis->name}}</a></li>
														</ul>
												</div>
										</article> --}}

                                    </table>

										<nav class="blog-pagination justify-content-center d-flex">
												<ul class="pagination">
														{!! $file->withQueryString()->links('pagination::bootstrap-5') !!}
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

										<aside class="single_sidebar_widget post_category_widget">
												<h4 class="widget_title">KATEGORI</h4>
												<ul class="list cat-list">
														@php
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
												@endforeach
												</ul>
										</aside>
								</div>
						</div>
				</div>
		</div>
</section>
<!--================Blog Area =================-->
@include('tema.wolio.footer')
