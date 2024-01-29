@include('tema.wolio.header')
<main>
	<!--? About Area Start-->
	
	<div class="about-details section-padding30">
		
		<div class="container">
			<h4>DAFTAR OPD</h4><br><br>
				<div class="row">
					
						<div class="offset-xl-1 col-lg-8">
								<div class="about-details-cap mb-50">
										<table class="table">
												<th></th>
												<th></th>	
											<tbody>
												@foreach ($opd as $opd_item)
												<tr>
													<td><center><img src="{{ asset('images/logo/'.$opd_item->pic)}}" width="250"> <br><br><a href="{{ $opd_item->link }}" class="btn post-btn " target="_blank">Akses Subdomain</a></center></td>
													<td><h4>{{ $opd_item->unit_kerja }}</h4></td>
												</tr>
												@endforeach
											</tbody>	
										</table>
										{!! $opd->withQueryString()->links('pagination::bootstrap-5') !!}
								</div>
						</div>
						
					
				</div>
		</div>
		
	</div>
</main>
@include('tema.wolio.footer')