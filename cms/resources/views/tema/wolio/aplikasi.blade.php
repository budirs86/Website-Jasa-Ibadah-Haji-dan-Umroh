@include('tema.wolio.header')
<main>
	<!--? About Area Start-->
	
	<div class="about-details section-padding30">
		
		<div class="container">
			<h4>DAFTAR APLIKASI</h4><br><br>
				<div class="row">
					
						<div class="offset-xl-1 col-lg-8">
								<div class="about-details-cap mb-50">
										<table class="table">
												<th></th>
												<th></th>	
											<tbody>
												@foreach ($aplikasi as $aplikasi_item)
												<tr>
													<td><center><img src="{{ asset('images/aplikasi/'.$aplikasi_item->pic)}}" width="300"><br><br><br><br><a href="{{ $aplikasi_item->link }}" class="btn post-btn " target="_blank">Akses Aplikasi</a></center></td>
													<td><h4>{{ $aplikasi_item->title }}</h4><br>{!! $aplikasi_item->description !!}<br></td>
												</tr>
												@endforeach
											</tbody>	
										</table>
										{!! $aplikasi->withQueryString()->links('pagination::bootstrap-5') !!}
								</div>
						</div>
						
					
				</div>
		</div>
		
	</div>


</main>
@include('tema.wolio.footer')